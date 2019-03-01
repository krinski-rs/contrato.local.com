<?php

namespace App\Entity\Nutri;

/**
 * PontoVenda
 */
class PontoVenda
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \DateTime
     */
    private $dataCadastro;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var bool
     */
    private $removido;


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
     * Set nome.
     *
     * @param string $nome
     *
     * @return PontoVenda
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dataCadastro.
     *
     * @param \DateTime $dataCadastro
     *
     * @return PontoVenda
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
     * Set ativo.
     *
     * @param bool $ativo
     *
     * @return PontoVenda
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
     * Set removido.
     *
     * @param bool $removido
     *
     * @return PontoVenda
     */
    public function setRemovido($removido)
    {
        $this->removido = $removido;

        return $this;
    }

    /**
     * Get removido.
     *
     * @return bool
     */
    public function getRemovido()
    {
        return $this->removido;
    }
}
