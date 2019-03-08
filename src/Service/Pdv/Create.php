<?php
namespace App\Service\Pdv;

use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Validator\Constraints as Assert;
// use Symfony\Component\Validator\Validation;
use Doctrine\ORM\EntityManager;
// use App\DBAL\Type\Enum\Vogel\NacionalidadePessoaType;
// use App\DBAL\Type\Enum\Vogel\TipoPessoaType;
use App\Entity\Nutri\PontoVenda;
// use App\Service\Pessoas\Nome\Create as CreateNome;
// use App\Service\Pessoas\Endereco\Create as CreateEndereco;
// use App\Service\Pessoas\Documento\Create as CreateDocumento;
// use App\Service\Pessoas\PessoaToPessoa\Create as CreateRelacionamento;
use Monolog\Logger;

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
    
    private function createRelacionamento(Request $objRequest)
    {
        try {
            $arrayRelacionamentos = $objRequest->get('relacionamentos', NULL);
            if(count($arrayRelacionamentos)){
//                 $objCreateRelacionamento = new CreateRelacionamento($this->objEntityManager);
//                 $objCreateRelacionamento->setPessoa($this->objPessoa);
                
                reset($arrayRelacionamentos);
                while($relacionamento = current($arrayRelacionamentos)){
//                     $objCreateRelacionamento->create(new Request([], [], $relacionamento));
//                     $this->objPessoa->addRelacao($objCreateRelacionamento->getPessoaToPessoa());
                    next($arrayRelacionamentos);
                }
                
//                 if($this->objPessoa->getRelacao()->count() != count($arrayRelacionamentos)){
//                     throw new \RuntimeException('Erro ao inserir os relacionamentos.');
//                 }
            }
            
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
            $this->objPontoVenda->setAtivo(TRUE);
            $this->objPontoVenda->setDataCadastro(new \DateTime());
            $this->objPontoVenda->setNome($objRequest->get('nome'));
            $this->objPontoVenda->setRemovido(FALSE);
        } catch (\RuntimeException $e){
            throw $e;
        } catch (\Exception $e){
            throw $e;
        }
    }
    
    private function validate(Request $objRequest)
    {
//         $objNotNull = new Assert\NotNull();
//         $objNotNull->message = 'Esse valor não deve ser nulo.';
//         $objNotBlank = new Assert\NotBlank();
//         $objNotBlank->message = 'Esse valor não deve estar em branco.';
        
//         $objLength = new Assert\Length(
//             [
//                 'min' => 2,
//                 'max' => 255,
//                 'minMessage' => 'O campo deve ter pelo menos {{ limit }} caracteres.',
//                 'maxMessage' => 'O campo não pode ser maior do que {{ limit }} caracteres.'
//             ]
//         );

//         $objChoiceNacionalidade = new Assert\Choice(
//             [
//                 'choices' => NacionalidadePessoaType::getChoices(),
//                 'message' => 'Selecione uma nacionalidade válida.'
//             ]
//         );
        
//         $objChoiceTipo = new Assert\Choice(
//             [
//                 'choices' => TipoPessoaType::getChoices(),
//                 'message' => 'Selecione um tipo de pessoa válido.'
//             ]
//         );
        
//         $objType = new Assert\Type(
//             [
//                 'type' => 'bool',
//                 'message' => 'O valor \'{{ value }}\' não é válido \'{{ type }}\'.'
//             ]
//         );
        
//         $objDate = new Assert\DateTime(
//             [
//                 'message' => 'O valor \'{{ value }}\' não é uma data válida.'
//             ]
//         );
        
//         $objLength = new Assert\Length(
//             [
//                 'min'           => 3,
//                 'max'           => 255,
//                 'minMessage'    => 'Este valor é muito curto. Deve ter {{ limit }} caracteres ou mais.',
//                 'maxMessage'    => 'Este valor é muito longo. Deve ter {{ limit }} caracteres ou menos.'
//             ]
//         );
        
//         $objCount = new Assert\Count(
//             [
//                 'min'           => 1,
//                 'max'           => 2,
//                 'minMessage'    => 'Esta coleção deve conter elementos de {{ limit }} ou mais.',
//                 'maxMessage'    => 'Esta coleção deve conter elementos de {{ limit }} ou menos.'
//             ]
//         );
        
//         $objRecursiveValidator = Validation::createValidatorBuilder()->getValidator();
        
//         $objCollection = new Assert\Collection(
//             [
//                 'fields' => [
//                     'nacionalidade' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objChoiceNacionalidade
//                         ]
//                     ),
//                     'tipo' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objChoiceTipo
//                         ]
//                     ),
//                     'dataAniversario' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objDate
//                         ]
//                     ),
//                     'ativo' => new Assert\Required( [
//                             $objNotNull,
//                             $objType
//                         ]
//                     ),
//                     'nomes' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objCount
//                         ]
//                     ),
//                     'enderecos' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objCount
//                         ]
//                     ),
//                     'documentos' => new Assert\Required( [
//                             $objNotNull,
//                             $objNotBlank,
//                             $objCount
//                         ]
//                     )
//                 ]
//             ]
//         );
//         $data = [
//             'tipo'                  => $objRequest->get('tipo', NULL),
//             'nacionalidade'         => $objRequest->get('nacionalidade', NULL),
//             'dataAniversario'       => $objRequest->get('dataAniversario', NULL),
//             'ativo'                 => $objRequest->get('ativo', NULL),
//             'nomes'                 => $objRequest->get('nomes', NULL),
//             'enderecos'             => $objRequest->get('enderecos', NULL),
//             'documentos'            => $objRequest->get('documentos', NULL)
//         ];
        
//         $this->objLogger->error('opa', $objRequest->attributes->all());
        
//         $objConstraintViolationList = $objRecursiveValidator->validate($data, $objCollection);
        
//         if($objConstraintViolationList->count()){
//             $objArrayIterator = $objConstraintViolationList->getIterator();
//             $objArrayIterator->rewind();
//             $mensagem = '';
//             while($objArrayIterator->valid()){
//                 if($objArrayIterator->key()){
//                     $mensagem.= "\n";
//                 }
//                 $mensagem.= $objArrayIterator->current()->getPropertyPath().': '.$objArrayIterator->current()->getMessage();
//                 $objArrayIterator->next();
//             }
//             throw new \RuntimeException($mensagem);
//         }
    }
    
    public function save()
    {
        if($this->objPontoVenda->getId()){
            $this->objEntityManager->merge($this->objPontoVenda);
        }else{
            $this->objEntityManager->persist($this->objPontoVenda);
        }
        $this->objEntityManager->flush();
        return $this->objPontoVenda;
    }
}

