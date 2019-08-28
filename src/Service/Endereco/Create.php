<?php
namespace App\Service\Endereco;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Doctrine\ORM\EntityManager;
use App\Entity\Nutri\PontoVenda;
// use App\Service\Pessoas\Nome\Create as CreateNome;
// use App\Service\Pessoas\Endereco\Create as CreateEndereco;
// use App\Service\Pessoas\Documento\Create as CreateDocumento;
// use App\Service\Pessoas\PessoaToPessoa\Create as CreateRelacionamento;
use Monolog\Logger;
use App\Entity\Nutri\Endereco;
use App\Entity\Localidade\Pais;
use App\Entity\Localidade\Cidade;
use App\Entity\Localidade\Estado;
use App\DBAL\PHP\Spatial\Geometry\Point;

class Create
{
    private $objEntityManager   = NULL;
    private $objEndereco        = NULL;
    private $objLogger          = NULL;
    private $objPontoVenda      = NULL;
    private $objPais            = NULL;
    private $objEstado          = NULL;
    private $objCidade          = NULL;
    private $objPoint           = NULL;
    
    public function __construct(EntityManager $objEntityManager, Logger $objLogger)
    {
        $this->objEntityManager = $objEntityManager;
        $this->objLogger = $objLogger;
    }
    
    public function setPontoVenda(PontoVenda $objPontoVenda)
    {
        $this->objPontoVenda = $objPontoVenda;
    }
    
    public function create(Request $objRequest)
    {
        try {
            $this->validate($objRequest);
                        
            $this->objEndereco = new Endereco();
            $this->objEndereco->setAtivo($objRequest->get('ativo', NULL));
            $this->objEndereco->setBairro($objRequest->get('bairro', NULL));
            $this->objEndereco->setCidade($this->objCidade);
            $this->objEndereco->setComplemento($objRequest->get('complemento', NULL));
            $this->objEndereco->setDataCadastro(new \DateTime());
            $this->objEndereco->setEstado($this->objEstado);
            $this->objEndereco->setLogradouro($objRequest->get('logradouro', NULL));
            $this->objEndereco->setNumero($objRequest->get('numero', NULL));
            $this->objEndereco->setPais($this->objPais);
            $this->objEndereco->setPoint($this->objPoint);
            $this->objEndereco->setPontoVenda($this->objPontoVenda);
            $this->objPontoVenda->setEndereco($this->objEndereco);
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
        
        $objRange = new Assert\Range(
            [
                'min' => 1,
                'minMessage' => 'O campo deve ter pelo menos {{ limit }} caracteres.'
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
                    'bairro' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objLength
                        ]
                    ),
                    'cidade' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objRange
                        ]
                    ),
                    'logradouro' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objLength
                        ]
                    ),
                    'numero' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objLength
                        ]
                    ),
                    'pais' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objRange
                        ]
                    ),
                    'estado' => new Assert\Required( [
                            $objNotNull,
                            $objNotBlank,
                            $objRange
                        ]
                    )
                ]
            ]
        );
        $data = [
            'ativo'         => $objRequest->get('ativo', NULL),
            'bairro'        => $objRequest->get('bairro', NULL),
            'cidade'        => $objRequest->get('cidade', NULL),
            'logradouro'    => $objRequest->get('logradouro', NULL),
            'numero'        => $objRequest->get('numero', NULL),
            'pais'          => $objRequest->get('pais', NULL),
            'estado'        => $objRequest->get('estado', NULL)
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
        
        $objRepositoryCidade    = $this->objEntityManager->getRepository('App\Entity\Localidade\Cidade');
        $objRepositoryEstado    = $this->objEntityManager->getRepository('App\Entity\Localidade\Estado');
        $objRepositoryPais      = $this->objEntityManager->getRepository('App\Entity\Localidade\Pais');

        if($objRequest->get('pontoVendaId', NULL)){
            $this->objPontoVenda = $this->objEntityManager->getRepository('App\Entity\Nutri\PontoVenda')->find($objRequest->get('pontoVendaId', NULL));
        }
        
        $this->objPais    = $objRepositoryPais->find($data['pais']);
        $mensagem = "";
        if(!($this->objPais instanceof Pais)){
            $mensagem.= "País não encontrado.";
        }
        
        $this->objEstado  = $objRepositoryEstado->find($data['estado']);
        if(!($this->objEstado instanceof Estado)){
            $mensagem.= "\nEstado não encontrado.";
        }
        
        $this->objCidade  = $objRepositoryCidade->find($data['cidade']);
        if(!($this->objCidade instanceof Cidade)){
            $mensagem.= "\nCidade não encontrada.";
        }
        
        
        if($objRequest->get('latitude', NULL) && $objRequest->get('longitude', NULL)){
            $this->objPoint = new Point($objRequest->get('latitude', NULL), $objRequest->get('longitude', NULL));
        }
        
    }
    
    public function save()
    {
        $this->objEntityManager->persist($this->objEndereco);
        $this->objEntityManager->flush();
        return $this->objEndereco;
    }
}

