angular.module('oficina', ['ionic'])

.directive('input', [function() {
    return {
        restrict: 'E',
        require: '?ngModel',	
        link: function(scope, element, attrs, ngModel) {
            if (
                   'undefined' !== typeof attrs.type
                && 'number' === attrs.type
                && ngModel
            ) {
                ngModel.$formatters.push(function(modelValue) {
                    return Number(modelValue);
                });

                ngModel.$parsers.push(function(viewValue) {
                    return Number(viewValue);
                });
            }
        }
    }
}])

.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    .state('tabs', {
      url: "/tab",
      abstract: true,
      templateUrl: "templates/tabs.html"
    })
    .state('tabs.home', {
      url: "/home",
      views: {
        'home-tab': {
          templateUrl: "templates/listaMotores.html",
          controller: 'motorCtrl'
        }
      }
    })
    .state('tabs.facts', {
      url: "/facts",
      views: {
        'home-tab': {
          templateUrl: "templates/facts.html"
        }
      }
    })
    .state('tabs.facts2', {
      url: "/facts2",
      views: {
        'home-tab': {
          templateUrl: "templates/facts2.html"
        }
      }
    })
    .state('tabs.about', {
      url: "/about",
      views: {
        'about-tab': {
            templateUrl: "templates/listaJogadores.html",
            controller: 'freioCtrl'
        }
      }
    })
    .state('tabs.navstack', {
      url: "/navstack",
      views: {
        'about-tab': {
          templateUrl: "templates/nav-stack.html"
        }
      }
    })
    .state('tabs.contact', {
      url: "/contact",
      views: {
        'contact-tab': {
          templateUrl: "templates/listaSuspensoes.html",
          controller: 'suspensaoCtrl'
        }
      }
    });


   $urlRouterProvider.otherwise("/tab/home");

})

.controller('HomeTabCtrl', function($scope, $ionicModal) {
  console.log('HomeTabCtrl');

  $scope.abastecimento = {};

  var abastecimentos = localStorage.getItem('abastecimentos');
  $scope.abastecimentos = abastecimentos ? angular.fromJson(abastecimentos) : [];

	var postos = localStorage.getItem('postos');
	$scope.postos = postos ? angular.fromJson(postos) : [];

   $ionicModal.fromTemplateUrl('templates/modal.html', {
     scope: $scope
   }).then(function(modal) {
     $scope.modal = modal;
   });

   $scope.adicionarAbastecimento = function(abastecimento) {
	   $scope.abastecimentos.push(abastecimento);

	   localStorage.setItem('abastecimentos', angular.toJson($scope.abastecimentos));
	   delete $scope.abastecimento;

	   $scope.modal.hide();
   };
})

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

