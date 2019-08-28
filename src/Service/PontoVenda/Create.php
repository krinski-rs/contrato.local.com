<?php
namespace App\Service\PontoVenda;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use App\Entity\Nutri\PontoVenda;
use App\Service\Endereco\Create as EnderecoCreate;

class Create
{
    private $objEntityManager   = NULL;
    private $objPontoVenda      = NULL;
    private $objLogger          = NULL;
    
    public function __construct(EntityManager $objEntityManager, Logger $objLogger)
    {
        $this->objEntityManager = $objEntityManager;
        $this->objLogger = $objLogger;
    }
    
    private function createEndereco(Request $objRequest)
    {
        try {
            
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    public function create(Request $objRequest)
    {
        try {
            $this->validate($objRequest);
                       
            $this->objPontoVenda = new PontoVenda();
            
            $objEnderecoCreate = new EnderecoCreate($this->objEntityManager, $this->objLogger);
            $objEnderecoCreate->setPontoVenda($this->objPontoVenda);
            $objEnderecoCreate->create($objRequest);
            
            $this->objPontoVenda->setAtivo($objRequest->get('ativo'));
            $this->objPontoVenda->setDataCadastro(new \DateTime());
            $this->objPontoVenda->setNome($objRequest->get('nome'));
            $this->objPontoVenda->setRemovido($objRequest->get('removido'));
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    private function validate(Request $objRequest)
    {
        $objNotNull = new Assert\NotNull();
        $objNotNull->message = 'Esse valor não deve ser nulo.';
        $objNotBlank = new Assert\NotBlank();
        $objNotBlank->message = 'Esse valor não deve estar em branco.';
        
        $objLength = new Assert\Length(
            [
                'min' => 2,
                'max' => 255,
                'minMessage' => 'O campo deve ter pelo menos {{ limit }} caracteres.',
                'maxMessage' => 'O campo não pode ser maior do que {{ limit }} caracteres.'
            ]
        );
        
        $objType = new Assert\Type(
            [
                'type' => 'bool',
                'message' => 'O valor \'{{ value }}\' não é válido \'{{ type }}\'.'
            ]
        );
        
        $objRecursiveValidator = Validation::createValidatorBuilder()->getValidator();
        
        $objCollection = new Assert\Collection(
            [
                'fields' => [
                    'ativo' => new Assert\Required( [
                            $objNotNull,
                            $objType
                        ]
                    ),
                    'nome' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objLength
                        ]
                    ),
                    'removido' => new Assert\Required( [
                            $objNotNull,
                            $objType
                        ]
                    )
                ]
            ]
        );
        $data = [
            'ativo'     => $objRequest->get('ativo', NULL),
            'nome'      => $objRequest->get('nome', NULL),
            'removido'  => $objRequest->get('removido', NULL)
        ];
                
        $objConstraintViolationList = $objRecursiveValidator->validate($data, $objCollection);
        
        if($objConstraintViolationList->count()){
            $objArrayIterator = $objConstraintViolationList->getIterator();
            $objArrayIterator->rewind();
            $mensagem = '';
            while($objArrayIterator->valid()){
                if($objArrayIterator->key()){
                    $mensagem.= "\n";
                }
                $mensagem.= $objArrayIterator->current()->getPropertyPath().': '.$objArrayIterator->current()->getMessage();
                $objArrayIterator->next();
            }
            throw new \RuntimeException($mensagem);
        }
    }
    
    public function save()
    {
        $this->objEntityManager->persist($this->objPontoVenda);
        $this->objEntityManager->flush();
        return $this->objPontoVenda;
    }
}

