angular.module('pokerGerente').controller('jogadorCtrl', function($scope, $ionicModal, jogadorService) {

	$scope.jogador = {};
	$scope.jogadores = [];

	//Tras a lista de jogadores
	jogadorService.getAll().success(function(retorno){
		$scope.jogadores = retorno;
	});

	$ionicModal.fromTemplateUrl('templates/modalJogador.html', {
		scope: $scope
	}).then(function(modal) {
		$scope.modal = modal;
	});

	$scope.adicionarJogador = function(jogador) {

		jogadorService.salvar(jogador).success(function(retorno){
			jogadorService.getAll()
				.success(function(retorno){
					$scope.jogadores = retorno;
				});

			$scope.jogador = {};
			$scope.modal.hide();
		});
	};

	$scope.alterarJogador = function(jogador){

		$scope.jogador = jogador;

		$scope.modal.show();
	};

	$scope.excluirJogador = function(id_jogador){
		jogadorService.delete(id_jogador)
			.success(function(retorno){
				jogadorService.getAll().success(function(retorno){
					$scope.jogadores = retorno;
				});

				$scope.modal.hide();
			});
	}
})