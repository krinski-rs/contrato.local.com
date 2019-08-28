<?php

namespace App\Entity\Localidade;

/**
 * Cidade
 */
class Cidade
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
     * @var \App\Entity\Localidade\Localidade.estado
     */
    private $estado;


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
     * @return Cidade
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
     * Set estado.
     *
     * @param \App\Entity\Localidade\Localidade.estado|null $estado
     *
     * @return Cidade
     */
    public function setEstado(\App\Entity\Localidade\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return \App\Entity\Localidade\Localidade.estado|null
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
