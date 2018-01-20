<?php

class Conexao {
	
	private $host 	  = 'gerpoker.mysql.dbaas.com.br';
	private $user 	  = 'gerpoker';
	private $password = 'Ok340944*';
	private $banco    = 'gerpoker';
	
	protected $conexao;
	protected $resultado;
	
	public function conectar()
	{			
		$this->conexao = mysqli_connect($this->host, $this->user, $this->password);
		
		mysqli_select_db($this->conexao, $this->banco)
		or die('Erro ao selecionar banco de dados.');		
	}
	
	public function desconectar()
	{
		mysqli_close($this->conexao);
	}
	
	public function executar($sql)
	{
		$this->conectar();
		$this->resultado = mysqli_query($this->conexao, $sql);
		$this->desconectar();
		
		return $this->resultado;
	}	
	
	public function recuperarTodos($sql)
	{
		$this->conectar();
		
		$this->resultado = mysqli_query($this->conexao, $sql);
		
		$registros = array();
		while($dados = mysqli_fetch_assoc($this->resultado)){
			$registros[] = $dados;
		}
		
		$this->desconectar();
		return $registros;
	}	
	
}