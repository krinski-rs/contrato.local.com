<?php
namespace App\Service\Pdv;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Listing
{
    private $objEntityManager = NULL;
    
    public function __construct(EntityManager $objEntityManager)
    {
        $this->objEntityManager = $objEntityManager;
    }
    
    public function get(int $idPessoa)
    {
        try {
            $objRepositoryPontoVenda = $this->objEntityManager->getRepository('App\Entity\Nutri\PontoVenda');
            return $objRepositoryPontoVenda->find($idPessoa);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function list(Request $objRequest)
    {
        try {
            $objRepositoryPontoVenda = $this->objEntityManager->getRepository('App\Entity\Nutri\PontoVenda');
            return $objRepositoryPontoVenda->findAll();
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

