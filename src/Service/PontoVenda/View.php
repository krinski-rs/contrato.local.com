<?php
namespace App\Service\PontoVenda;

// use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class View
{
    private $objEntityManager = NULL;
    
    public function __construct(EntityManager $objEntityManager)
    {
        $this->objEntityManager = $objEntityManager;
    }
    
    public function get(int $idPdv)
    {
        try {
//             \Doctrine\Common\Util\Debug::dump($this->objEntityManager->getRepository('App\Entity\Nutri\PontoVenda')->find($idPdv), 2);
//             exit();
//             return [4444];
            $objRepositoryPontoVenda = $this->objEntityManager->getRepository('App\Entity\Nutri\PontoVenda');
            return $objRepositoryPontoVenda->find($idPdv);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

