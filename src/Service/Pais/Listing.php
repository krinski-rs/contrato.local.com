<?php
namespace App\Service\Pais;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class Listing
{
    private $objEntityManager = NULL;
    
    public function __construct(EntityManager $objEntityManager)
    {
        $this->objEntityManager = $objEntityManager;
    }
    
    public function get(int $idPais)
    {
        try {
            $objRepositoryPais = $this->objEntityManager->getRepository('App\Entity\Localidade\Pais');
            return $objRepositoryPais->find($idPais);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function list(Request $objRequest)
    {
        try {
            $objRepositoryPais = $this->objEntityManager->getRepository('App\Entity\Localidade\Pais');
            return $objRepositoryPais->findAll();
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

