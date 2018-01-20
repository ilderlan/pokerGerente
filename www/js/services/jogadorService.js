angular.module('pokerGerente').service('jogadorService', function($http){
	
	this.getAll = function(){
		return $http.get('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/jogador/jogador.php');
	}
	
	this.delete = function(id_jogador){
		return $http.delete('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/jogador/jogador.php?id_jogador=' + id_jogador);
	}
	
	this.salvar = function(jogador){
		if(jogador.id_jogador){
			return $http.put('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/jogador/jogador.php', jogador);
		}
		
		return $http.post('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/jogador/jogador.php', jogador);
	}
	
});