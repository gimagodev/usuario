angular.module('myApp', ['angular-growl', 'ngAnimate']);

angular.module('myApp').config(['growlProvider', function (growlProvider) {
  //Configuração do tempo que a mensagem ficará na tela
  growlProvider.globalTimeToLive(5000);
}]);

angular.module('myApp').controller("myCtrl", function($scope, growl){
 $scope.alerta = function(){
    var config = {};
    growl.success("<b>Mensagem de Sucesso</b>", config);
    growl.info("Mensagem Info", config);
    growl.warning("Mensagem Alerta", config);
    growl.error("Mensagem Erro :(", config);
 }
});


//	<div ng-app="myApp" ng-controller="myCtrl">
//		<div growl></div>
//	   <button class="btn btn-success" ng-click="alerta()">Alerta</button>
//	</div -->

<!-- angular-growl   -->
	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" />
		<link rel="stylesheet" href="//rawgit.com/JanStevens/angular-growl-2/master/build/angular-growl.css" />

		<!-- div ng-app="myApp" ng-controller="myCtrl">
		   <div growl></div>
		   <button class="btn btn-success" ng-click="alerta()">Alerta</button>
		</div -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-animate.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-sanitize.js" type="text/javascript"></script>
		<script src="//rawgit.com/JanStevens/angular-growl-2/master/build/angular-growl.js" type="text/javascript"></script>
	<!-- fim angular-growl -->