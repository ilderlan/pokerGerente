<?php

include_once '../conexao.php';

class Jogador{

    protected $idJogador;
    protected $nome;

    public function getIdJogador()
    {
        return $this->idJogador;
    }

    public function setIdJogador($idJogador)
    {
        $this->idJogador = $idJogador;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function inserir($dados)
    {
        $primeiroNome 		= !empty($dados->primeiro_nome) 	? $dados->primeiro_nome   : '';
        $sobreNome 	        = !empty($dados->sobre_nome)        ? $dados->sobre_nome 	  : '';
        $idade 	            = !empty($dados->idade)             ? $dados->idade 	      : '';
        $cpf                = !empty($dados->cpf)               ? $dados->cpf             : '';
        $sexo 	            = !empty($dados->sexo)              ? $dados->sexo 	          : '';
        $complemento 	    = !empty($dados->complemento)       ? $dados->complemento 	  : '';

        $sql = "insert into tb_jogadores (primeiro_nome, sobre_nome, idade, cpf, sexo, complemento) 
						   values ('$primeiroNome', '$sobreNome', '$idade', '$cpf', '$sexo', '$complemento')";
        echo $sql;
        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $idJogador 	        = !empty($dados->id_jogador)        ? $dados->id_jogador 	   : '';
        $primeiroNome 		= !empty($dados->primeiro_nome) 	? $dados->primeiro_nome   : '';
        $sobreNome 	        = !empty($dados->sobre_nome)        ? $dados->sobre_nome 	  : '';
        $idade 	            = !empty($dados->idade)             ? $dados->idade 	      : '';
        $cpf                = !empty($dados->cpf)               ? $dados->cpf             : '';
        $sexo 	            = !empty($dados->sexo)              ? $dados->sexo 	          : '';
        $complemento 	    = !empty($dados->complemento)       ? $dados->complemento 	  : '';

        $sql = "update tb_jogadores set
					primeiro_nome   = '$primeiroNome',
					sobre_nome      = '$sobreNome',
					idade           = '$idade',
					cpf             = '$cpf',
					sexo            = '$sexo',
					complemento     = '$complemento'
				
				where id_jogador  = $idJogador ";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function excluir($idJogador)
    {
        $sql = "delete from tb_jogadores where id_jogador = $idJogador";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function recuperarTodos()
    {
        $conexao = new Conexao();

        $sql = "select * from tb_jogadores";
        return $conexao->recuperarTodos($sql);
    }


    public function carregarPorId($idJogador)
    {
        $conexao = new Conexao();

        $sql = "select * from tb_Jogadores where id_Jogador = $idJogador";
        $dados = $conexao->recuperarTodos($sql);

        $this->idJogador = $dados[0]['id_jogador'];
        $this->nome = $dados[0]['nome'];
    }
}