'use strict';
var app = angular.module('cdg',[]);

// Service
app.factory('pessoaService',function($http) {
	return {
		lista: function(){
			return $http.get('/api/pessoas');
		},
		cadastra: function(data){
			return $http.post('/api/pessoas', data);
		},
		edita: function(data){
			var id = data.id;
			delete data.id;
			return $http.put('/api/pessoa/'+id, data);
		},
		exclui: function(id){
			return $http.delete('/api/pessoa/'+id)
		}
	}
});

// Controller
app.controller('pessoaController', function($scope, pessoaService) {
	$scope.listar = function(){
		pessoaService.lista().success(function(data){
			$scope.pessoas = data;
		});
	}

	$scope.editar = function(data){
		$scope.pessoa = data;
		$('#myModal').modal('show');
	}

	$scope.salvar = function(){
		if($scope.pessoa.id){
			pessoaService.edita($scope.pessoa).success(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}else{
			pessoaService.cadastra($scope.pessoa).success(function(res){
				$scope.listar();
				$('#myModal').modal('hide');
			});
		}
	}

	$scope.excluir = function(data){
		if(confirm("Tem certeza que deseja excluir?")){
			pessoaService.exclui(data.id).success(function(res){
				$scope.listar();
			});
		}
	}
});