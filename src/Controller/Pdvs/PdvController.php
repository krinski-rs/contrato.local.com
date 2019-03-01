<?php
namespace App\Controller\Pdvs;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Pdvs\Pdv as PdvService;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\Serializer\Serializer;
// use Symfony\Component\Serializer\Encoder\XmlEncoder;
// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
// use App\Entity\Pdvs\Pdv;

class PdvController extends Controller
{
    public function postPdv(Request $objRequest)
    {
        try {
            $objPdvsPdv = $this->get('pdvs.pdv');
            if(!$objPdvsPdv instanceof PdvService){
                return new JsonResponse(['message'=> 'Class "App\Service\Pdvs\Pdv not found."'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

//             $objPdv = $objPdvsPdv->create($objRequest);
            
//             return new JsonResponse(['id'=>$objPdv->getId()], Response::HTTP_OK);
            return new JsonResponse(['id'=>1], Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
//     public function getPdv(int $idPdv)
//     {
//         try {
//             $objPdvsPdv = $this->get('pdvs.pdv');
//             if(!$objPdvsPdv instanceof PdvService){
//                 return new JsonResponse(['message'=> 'Class "App\Service\Pdvs\Pdv not found."'], Response::HTTP_INTERNAL_SERVER_ERROR);
//             }
            
//             $objPdv = $objPdvsPdv->get($idPdv);
//             $encoders = array(new XmlEncoder(), new JsonEncoder());
            
//             $objObjectNormalizer = new ObjectNormalizer();
        
//             $objObjectNormalizer->setCircularReferenceHandler(function (Pdv $objPdv) {
//                 return $objPdv->getId();
//             });
        
//             $callbackDateTime = function ($dateTime) {
//                 return $dateTime instanceof \DateTime
//                 ? $dateTime->format(\DateTime::ISO8601)
//                 : '';
//             };
                
//             $objObjectNormalizer->setCallbacks(array('dataCadastro' => $callbackDateTime, 'dataAniversario' => $callbackDateTime));
//             $objObjectNormalizer->setCircularReferenceLimit(1);
//             $normalizers = array($objObjectNormalizer);
            
            
//             $objSerializer = new Serializer($normalizers, $encoders);
//             return new JsonResponse($objSerializer->normalize($objPdv, 'json'), Response::HTTP_OK);
//         } catch (\RuntimeException $e) {
//             return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
//         } catch (\Exception $e) {
//             return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
//         }
//     }
    
    public function getPdvs(Request $objRequest)
    {
        try {
//             $objPdvsPdv = $this->get('pdvs.pdv');
//             if(!$objPdvsPdv instanceof PdvService){
//                 return new JsonResponse(['message'=> 'Class "App\Service\Pdvs\Pdv not found."'], Response::HTTP_INTERNAL_SERVER_ERROR);
//             }
            
//             $arrayPdv = $objPdvsPdv->list($objRequest);
//             $encoders = array(new XmlEncoder(), new JsonEncoder());
            
//             $objObjectNormalizer = new ObjectNormalizer();
            
//             $objObjectNormalizer->setCircularReferenceHandler(function (Pdv $objPdv) {
//                 return $objPdv->getId();
//             });
            
//             $callbackDateTime = function ($dateTime) {
//                 return $dateTime instanceof \DateTime
//                 ? $dateTime->format(\DateTime::ISO8601)
//                 : '';
//             };
            
//             $objObjectNormalizer->setCallbacks(array('dataCadastro' => $callbackDateTime, 'dataAniversario' => $callbackDateTime));
//             $objObjectNormalizer->setCircularReferenceLimit(1);
//             $normalizers = array($objObjectNormalizer);
            
            
//             $objSerializer = new Serializer($normalizers, $encoders);
//             return new JsonResponse($objSerializer->normalize([1231, 456465], 'json'), Response::HTTP_OK);
            return new JsonResponse([1231, 456465], Response::HTTP_OK);
        } catch (\RuntimeException $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_PRECONDITION_FAILED);
        } catch (\Exception $e) {
            return new JsonResponse(['mensagem'=>$e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
//     public function deletePdv(int $idPdv)
//     {
//         return new JsonResponse(['id'=>['deletePdv']], Response::HTTP_OK);
//     }
    
//     public function putPdv(int $idPdv)
//     {
//         return new JsonResponse(['id'=>['putPdv']], Response::HTTP_OK);
//     }
    
//     public function patchPdv(int $idPdv)
//     {
//         return new JsonResponse(['id'=>['patchPdv']], Response::HTTP_OK);
//     }
    
}

