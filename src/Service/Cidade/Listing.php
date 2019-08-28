<?php
namespace App\Service\Cidade;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Listing
{
    private $objEntityManager = NULL;
    
    public function __construct(EntityManager $objEntityManager)
    {
        $this->objEntityManager = $objEntityManager;
    }
    
    public function get(int $idCidade)
    {
        try {
            $objRepositoryEstado = $this->objEntityManager->getRepository('App\Entity\Localidade\Cidade');
            return $objRepositoryEstado->find($idCidade);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function list(Request $objRequest)
    {
        try {
            $objRepositoryCidade = $this->objEntityManager->getRepository('App\Entity\Localidade\Cidade');
            $criteria = [];
            if($objRequest->get('estado', NULL)){
                $criteria['estado'] = $objRequest->get('estado', NULL);
            }
            return $objRepositoryCidade->findBy($criteria);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

