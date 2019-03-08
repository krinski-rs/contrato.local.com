<?php
namespace App\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Pdv\Create;
use App\Service\Pdv\Listing;
use Monolog\Logger;

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
    
//     public function get(int $idPdv)
//     {
//         try {
//             $objPdvsPdvListing = new Listing($this->objEntityManager);
//             return $objPdvsPdvListing->get($idPdv);
//         } catch (\RuntimeException $e){
//             throw $e;
//         } catch (\Exception $e){
//             throw $e;
//         }
//     }
    
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

