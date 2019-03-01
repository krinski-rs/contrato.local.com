<?php
namespace App\Service\Pdvs;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
// use App\Service\Pdvs\Pdv\Create;
// use App\Service\Pdvs\Pdv\Listing;
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
//             $objPdvsPdvCreate = new Create($this->objEntityManager, $this->objLogger);
//             $objPdvsPdvCreate->create($objRequest);
//             return $objPdvsPdvCreate->save();
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
//             $objPdvsPdvListing = new Listing($this->objEntityManager);
//             return $objPdvsPdvListing->list($objRequest);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

