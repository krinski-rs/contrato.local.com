<?php
namespace App\Controller\Localidade;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Service\Pdv;
use App\Entity\Nutri\PontoVenda;
use App\Service\Localidade;
use App\Entity\Localidade\Pais;

class LocalidadeController extends AbstractController
{    
    private $objLocalidade = NULL;
    
    public function __construct(Localidade $objLocalidade){
        $this->objLocalidade = $objLocalidade;
    }
    
    public function getNacao(Request $objRequest, int $paisId)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $objPais = $this->objLocalidade->getPais($paisId);
            
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($objPais, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function getPais(Request $objRequest)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
            $arrayPais = $this->objLocalidade->listPais($objRequest);
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($arrayPais, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function getEstado(Request $objRequest, int $estadoId)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $objEstado = $this->objLocalidade->getEstado($estadoId);
            
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($objEstado, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function getEstados(Request $objRequest)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
            $arrayEstado = $this->objLocalidade->listEstado($objRequest);
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($arrayEstado, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function getCidade(Request $objRequest, int $cidadeId)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            $objCidade = $this->objLocalidade->getCidade($cidadeId);
            
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($objCidade, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    public function getCidades(Request $objRequest)
    {
        try {
            if(!$this->objLocalidade instanceof Localidade){
                return new JsonResponse(['message'=> 'Class "App\Service\Localidade" not found.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
            $arrayCidade = $this->objLocalidade->listCidade($objRequest);
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            
            $objObjectNormalizer = new ObjectNormalizer();
            
            $normalizers = array($objObjectNormalizer);
            
            $objSerializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($objSerializer->normalize($arrayCidade, 'json'), Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

