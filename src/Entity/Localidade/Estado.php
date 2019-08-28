<?php

namespace App\Entity\Localidade;

/**
 * Estado
 */
class Estado
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
     * @var string
     */
    private $sigla;

    /**
     * @var \App\Entity\Localidade\Localidade.pais
     */
    private $pais;


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
     * @return Estado
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
     * Set sigla.
     *
     * @param string $sigla
     *
     * @return Estado
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla.
     *
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set pais.
     *
     * @param \App\Entity\Localidade\Localidade.pais|null $pais
     *
     * @return Estado
     */
    public function setPais(\App\Entity\Localidade\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais.
     *
     * @return \App\Entity\Localidade\Localidade.pais|null
     */
    public function getPais()
    {
        return $this->pais;
    }
}
