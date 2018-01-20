angular.module('pokerGerente').controller('torneioCtrl', function($scope, $ionicModal, torneioService) {

	$scope.torneio = {};
	$scope.torneios = [];

	//Tras a lista de torneios
	torneioService.getAll().success(function(retorno){
		$scope.torneios = retorno;
	});

	$ionicModal.fromTemplateUrl('templates/modalTorneio.html', {
		scope: $scope
	}).then(function(modal) {
		$scope.modal = modal;
	});

	$scope.adicionarTorneio = function(torneio) {

		torneioService.salvar(torneio).success(function(retorno){
			torneioService.getAll()
				.success(function(retorno){
					$scope.torneios = retorno;
				});

			$scope.torneio = {};
			$scope.modal.hide();
		});
	};

	$scope.alterarTorneio = function(torneio){

		$scope.torneio = torneio;

		$scope.modal.show();
	};

	$scope.excluirTorneio = function(id_torneio){
		torneioService.delete(id_torneio)
			.success(function(retorno){
				torneioService.getAll().success(function(retorno){
					$scope.torneios = retorno;
				});

				$scope.modal.hide();
			});
	}

	$scope.fecharModal = function () {
		$scope.torneio = {};
		$scope.modal.hide();

	}
})