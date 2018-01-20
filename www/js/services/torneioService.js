angular.module('pokerGerente').service('torneioService', function($http){
	
	this.getAll = function(){
		return $http.get('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/torneio/torneio.php');
	}
	
	this.delete = function(id_torneio){
		return $http.delete('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/torneio/torneio.php?id_torneio=' + id_torneio);
	}
	
	this.salvar = function(torneio){
		if(torneio.id_torneio){
			return $http.put('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/torneio/torneio.php', torneio);
		}
		return $http.post('http://localhost/dashboard/workspace/aplicacao-dipositivos-moveis/pokerGerente/www/servicos/torneio/torneio.php', torneio);
	}
	
});