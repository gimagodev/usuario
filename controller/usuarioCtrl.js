// angular js codes
/**  angular js codes
** APP_DOCUMENTO.JS
**@AUTHOR: Gideon Marinho Gonçalves - 23/04/2018
*/
//http://matera.com/br/2015/08/26/estrutura-de-diretorios-em-projetos-angularjs/
// https://fritz.ninja/angular-growl-2/

var app = angular.module('myApp',[]);
app.controller('usuarioCtrl', function($scope, $http) {

    // criar um novo registro
    $scope.incluir = function() {
        /* $http.post("contato/app/inserir_usuario.php", */
        $http.post("app/inserir_usuario.php", {
            'nome'      : typeof $scope.nome        == "undefined" ? "" : $scope.nome,
            'sobrenome' : typeof $scope.sobrenome   == "undefined" ? "" : $scope.sobrenome,
            'email'     : typeof $scope.email       == "undefined" ? "" : $scope.email,
            'telefone'  : typeof $scope.celular     == "undefined" ? "" : $scope.celular,
            'senha'     : typeof $scope.senha       == "undefined" ? "" : $scope.senha,
            'endereco'  : typeof $scope.endereco    == "undefined" ? "" : $scope.endereco,
            'cidade'    : typeof $scope.cidade      == "undefined" ? "" : $scope.cidade,
            'origem'    : typeof $scope.origem      == "undefined" ? "" : $scope.origem,
            'endereco'  : typeof $scope.endereco    == "undefined" ? "" : $scope.endereco,
            'mensagem'  : typeof $scope.mensagem    == "undefined" ? "" : $scope.mensagem
        }
        ).success(function(data,status,headers,config) {
            console.log(data);

            // informar que novo registro foi criado
            // Materialize.toast(data, 4000);

            // $scope.alerta();
            $scope.limparTela();

        });
    }

    $scope.limparTela = function() {

        $scope.nome="";
       // $scope.sobrenome="";
        $scope.email="";
        $scope.celular="";
        $scope.mensagem="";

        $('#mensagemSucesso').text("Dados enviados com sucesso. Brevemente entraremos em contato. Obrigado!");

    }

});
