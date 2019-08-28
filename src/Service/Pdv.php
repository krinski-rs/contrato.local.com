<?php
namespace App\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use App\Service\PontoVenda\Create;
use App\Service\PontoVenda\Listing;
use Monolog\Logger;
use App\Service\PontoVenda\View;
use App\Entity\Nutri\PontoVenda;

class Pdv
{
    private $objEntityManager   = NULL;
    private $objLogger          = NULL;
    
    public function __construct(Registry $objRegistry, Logger $objLogger)
    {
        $this->objEntityManager = $objRegistry->getManager('default');
        $this->objLogger = $objLogger;
    }
    
    public function create(Request $objRequest)
    {
        try {
            $objPdvCreate = new Create($this->objEntityManager, $this->objLogger);
            $objPdvCreate->create($objRequest);
            return $objPdvCreate->save();
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function get(int $idPdv)
    {
        try {
            $objPdvsPdvView = new View($this->objEntityManager);
            $objPontoVenda = $objPdvsPdvView->get($idPdv);
            if($objPontoVenda instanceof PontoVenda){
                return [
                    'id' => $objPontoVenda->getId(),
                    'nome' => $objPontoVenda->getNome(),
                    'ativo' => $objPontoVenda->getAtivo(),
                    'removido' => $objPontoVenda->getRemovido(),
                    'dataCadastro' => ($objPontoVenda->getDataCadastro()?$objPontoVenda->getDataCadastro()->format(\DateTime::RFC3339):NULL)
                ];
            }
            return [];
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function list(Request $objRequest)
    {
        try {
            $objPdvsPdvListing = new Listing($this->objEntityManager);
            return $objPdvsPdvListing->list($objRequest);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

