<!DOCTYPE html>
<html ng-app="cdg">
<head>
	<title>Cadastro de Pessoas</title>
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">

	<script type="text/javascript" src="node_modules/jquery/jquery.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

	<!-- Angular -->
	<script type="text/javascript" src="node_modules/angular/angular.js"></script>

	<!-- App -->
	<script type="text/javascript" src="app/app.js"></script>
</head>
<body ng-controller="pessoaController">
	<div class="container" ng-init="listar()">
		<div class="row">
			<div class="col-md-12">
				<h1>Cadastro de Pessoas</h1>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nova Pessoa</button>
			</div>
			<div class="col-md-6">
				<input class="form-control" ng-model="pesquisar">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="pessoa in pessoas | filter: pesquisar">
							<td>{{pessoa.id}}</td>
							<td>{{pessoa.nome}}</td>
							<td>{{pessoa.email}}</td>
							<td>
								<button class="btn btn-info btn-xs" ng-click="editar(pessoa)">Editar</button>
								<button class="btn btn-danger btn-xs" ng-click="excluir(pessoa)">Excluir</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Cadastro de Pessoa</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" class="form-control" ng-model="pessoa.nome">
					</div>
					<div class="form-group">
						<label>E-mail:</label>
						<input type="email" class="form-control" ng-model="pessoa.email">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" ng-click="pessoa = {}">Cancelar</button>
					<button type="button" class="btn btn-primary" ng-click="salvar()">Salvar</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>