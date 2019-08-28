<?php
namespace App\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Pais\Listing as PaisListing;
use App\Service\Estado\Listing as EstadoListing;
use App\Service\Cidade\Listing as CidadeListing;
use Monolog\Logger;

class Localidade
{
    private $objEntityManager   = NULL;
    private $objLogger          = NULL;
    
    public function __construct(Registry $objRegistry, Logger $objLogger)
    {
        $this->objEntityManager = $objRegistry->getManager('localidade');
        $this->objLogger = $objLogger;
    }
    
    public function getPais(int $paisId)
    {
        try {
            $objPaisListing = new PaisListing($this->objEntityManager, $this->objLogger);
            return $objPaisListing->get($paisId);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function listPais(Request $objRequest)
    {
        try {
            $objPaisListing = new PaisListing($this->objEntityManager, $this->objLogger);
            return $objPaisListing->list($objRequest);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function getEstado(int $estadoId)
    {
        try {
            $objEstadoListing = new EstadoListing($this->objEntityManager, $this->objLogger);
            return $objEstadoListing->get($estadoId);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function listEstado(Request $objRequest)
    {
        try {
            $objEstadoListing = new EstadoListing($this->objEntityManager, $this->objLogger);
            return $objEstadoListing->list($objRequest);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function getCidade(int $cidadeId)
    {
        try {
            $objCidadeListing = new CidadeListing($this->objEntityManager, $this->objLogger);
            return $objCidadeListing->get($cidadeId);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function listCidade(Request $objRequest)
    {
        try {
            $objCidadeListing = new CidadeListing($this->objEntityManager, $this->objLogger);
            return $objCidadeListing->list($objRequest);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
}

