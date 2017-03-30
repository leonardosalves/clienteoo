<?php

/**
 * Created by PhpStorm.
 * User: LEONARDO TI
 * Date: 28/03/2017
 * Time: 18:09
 */

namespace src;

class Client
{
    private $id;
    private $nome;
    private $cpf;
    private $endereco;
    private $pessoa;
    private $importancia;

    /**
     * Client constructor.
     * @param $id
     * @param $nome
     * @param $cpf
     * @param $endereco
     * @param $pessoa
     */
    public function __construct($id, $nome, $cpf, $endereco, $pessoa,$importancia){
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->pessoa = $pessoa;
        $this->importancia = $importancia;
    }

    public function getImportancia()
    {
        return $this->importancia;
    }
    function setImportancia($importancia)
    {
        $this->importancia = $importancia;
        return $this;
    }


    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

}