<?php

include_once '../conexao.php';

class Torneio{

    protected $idTorneio;
    protected $nome;

    public function getIdTorneio()
    {
        return $this->idTorneio;
    }

    public function setIdTorneio($idTorneio)
    {
        $this->idTorneio = $idTorneio;
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
        $nome 		                = !empty($dados->nome) 	                      ? $dados->nome                        : '';
        $vlPremio 	                = !empty($dados->vl_premio)                   ? $dados->vl_premio 	                : '';
        $numPremiados 	            = !empty($dados->num_premiados)               ? $dados->num_premiados 	            : '';
        $vlInscricao                = !empty($dados->vl_inscricao)                ? $dados->vl_inscricao                : '';
        $tpApostaCega 	            = !empty($dados->tp_aposta_cega)              ? $dados->tp_aposta_cega 	            : '';
        $numMaximoParticipantes 	= !empty($dados->num_maximo_participantes)    ? $dados->num_maximo_participantes 	: '';
        $cep 	                    = !empty($dados->tb_endereco_cep)             ? $dados->tb_endereco_cep 	        : '';

        $sql = "insert into tb_torneios (nome, vl_premio, num_premiados, vl_inscricao, tp_aposta_cega, num_maximo_participantes, tb_endereco_cep) 
						   values ('$nome', '$vlPremio', '$numPremiados', '$vlInscricao', '$tpApostaCega', '$numMaximoParticipantes', '$cep')";
        echo $sql;
        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $idTorneio 	                = !empty($dados->id_torneio)                  ? $dados->id_torneio 	                : '';
        $nome 		                = !empty($dados->nome) 	                      ? $dados->nome                        : '';
        $vlPremio 	                = !empty($dados->vl_premio)                   ? $dados->vl_premio 	                : '';
        $numPremiados 	            = !empty($dados->num_premiados)               ? $dados->num_premiados 	            : '';
        $vlInscricao                = !empty($dados->vl_inscricao)                ? $dados->vl_inscricao                : '';
        $tpApostaCega 	            = !empty($dados->tp_aposta_cega)              ? $dados->tp_aposta_cega 	            : '';
        $numMaximoParticipantes 	= !empty($dados->num_maximo_participantes)    ? $dados->num_maximo_participantes 	: '';
        $cep 	                    = !empty($dados->tb_endereco_cep)             ? $dados->tb_endereco_cep 	        : '';

        $sql = "update tb_torneios set
					nome                         = '$nome',
					vl_premio                    = '$vlPremio',
					num_premiados                = '$numPremiados',
					vl_inscricao                 = '$vlInscricao',
					tp_aposta_cega               = '$tpApostaCega',
					num_maximo_participantes     = '$numMaximoParticipantes',
					tb_endereco_cep              = '$cep'
				
				where id_torneio  = $idTorneio ";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function excluir($idtorneio)
    {
        $sql = "delete from tb_torneios where id_torneio = $idtorneio";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function recuperarTodos()
    {
        $conexao = new Conexao();

        $sql = "select * from tb_torneios";
        return $conexao->recuperarTodos($sql);
    }


    public function carregarPorId($idtorneio)
    {
        $conexao = new Conexao();

        $sql = "select * from tb_torneios where id_torneio = $idtorneio";
        $dados = $conexao->recuperarTodos($sql);

        $this->idtorneio = $dados[0]['id_torneio'];
        $this->nome = $dados[0]['nome'];
    }
}