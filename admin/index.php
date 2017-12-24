<!DOCTYPE html>
<html>
<head>
	<title>Sistema Conexão</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" 
	href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" 
	href="css/style.css">

	<script type="text/javascript"
	src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"
	src="js/bootstrap.min.js"></script>
	<script type="text/javascript"
	src="js/bootstrap-inputmask.min.js"></script>
	<script type="text/javascript"
	src="js/jqBootstrapValidation.js"></script>

	<script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
</head>
<body>

	<div class="well login">
		<h1 class="text-center">
		Tela de Login
		</h1>

		<form name="login" method="post" action="verificar.php" novalidate>
			
			<div class="control-group">
				<label for="login" class="control-label">
				Login:
				</label>

				<div class="controls">
					<input type="text" 
					name="login" required
					data-validation-required-message="Digite o login"
					class="form-control">
				</div>
			</div>

			<div class="control-group">
				<label for="senha"
				class="control-label">
				Senha:
				</label>
				<div class="controls">
					<input type="password"
					name="senha" required
					data-validation-required-message="Digite sua senha"
					class="form-control">
				</div>
			</div>

			<button type="submit"
			class="btn btn-success">
			Logar
			</button>
		</form>
	</div>

</body>
</html>