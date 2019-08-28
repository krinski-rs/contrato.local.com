<?php
namespace App\Service\Estado;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Listing
{
    private $objEntityManager = NULL;
    
    public function __construct(EntityManager $objEntityManager)
    {
        $this->objEntityManager = $objEntityManager;
    }
    
    public function get(int $idEstado)
    {
        try {
            $objRepositoryEstado = $this->objEntityManager->getRepository('App\Entity\Localidade\Estado');
            return $objRepositoryEstado->find($idEstado);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function list(Request $objRequest)
    {
        try {
            $objRepositoryEstado = $this->objEntityManager->getRepository('App\Entity\Localidade\Estado');
            $criteria = [];
            if($objRequest->get('pais', NULL)){
                $criteria['pais'] = $objRequest->get('pais', NULL);
            }
            return $objRepositoryEstado->findBy($criteria);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

