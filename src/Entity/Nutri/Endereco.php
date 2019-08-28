<?php

namespace App\Entity\Nutri;

/**
 * Endereco
 */
class Endereco
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var string
     */
    private $logradouro;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string|null
     */
    private $complemento;

    /**
     * @var point|null
     */
    private $point;

    /**
     * @var bool
     */
    private $ativo = true;

    /**
     * @var \DateTime
     */
    private $dataCadastro = 'now()';

    /**
     * @var \App\Entity\Nutri\PontoVenda
     */
    private $pontoVenda;

    /**
     * @var \App\Entity\Localidade\Pais
     */
    private $pais;

    /**
     * @var \App\Entity\Localidade\Estado
     */
    private $estado;

    /**
     * @var \App\Entity\Localidade\Cidade
     */
    private $cidade;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bairro.
     *
     * @param string $bairro
     *
     * @return Endereco
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro.
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set logradouro.
     *
     * @param string $logradouro
     *
     * @return Endereco
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro.
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set numero.
     *
     * @param string $numero
     *
     * @return Endereco
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento.
     *
     * @param string|null $complemento
     *
     * @return Endereco
     */
    public function setComplemento($complemento = null)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento.
     *
     * @return string|null
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set point.
     *
     * @param point|null $point
     *
     * @return Endereco
     */
    public function setPoint($point = null)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point.
     *
     * @return point|null
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set ativo.
     *
     * @param bool $ativo
     *
     * @return Endereco
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo.
     *
     * @return bool
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set dataCadastro.
     *
     * @param \DateTime $dataCadastro
     *
     * @return Endereco
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro.
     *
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set pontoVenda.
     *
     * @param \App\Entity\Nutri\PontoVenda|null $pontoVenda
     *
     * @return Endereco
     */
    public function setPontoVenda(\App\Entity\Nutri\PontoVenda $pontoVenda = null)
    {
        $this->pontoVenda = $pontoVenda;

        return $this;
    }

    /**
     * Get pontoVenda.
     *
     * @return \App\Entity\Nutri\PontoVenda|null
     */
    public function getPontoVenda()
    {
        return $this->pontoVenda;
    }

    /**
     * Set pais.
     *
     * @param \App\Entity\Localidade\Pais|null $pais
     *
     * @return Endereco
     */
    public function setPais(\App\Entity\Localidade\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais.
     *
     * @return \App\Entity\Localidade\Pais|null
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set estado.
     *
     * @param \App\Entity\Localidade\Estado|null $estado
     *
     * @return Endereco
     */
    public function setEstado(\App\Entity\Localidade\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return \App\Entity\Localidade\Estado|null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cidade.
     *
     * @param \App\Entity\Localidade\Cidade|null $cidade
     *
     * @return Endereco
     */
    public function setCidade(\App\Entity\Localidade\Cidade $cidade = null)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade.
     *
     * @return \App\Entity\Localidade\Cidade|null
     */
    public function getCidade()
    {
        return $this->cidade;
    }
}
