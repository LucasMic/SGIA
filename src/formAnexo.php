<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php 
			include_once "constantes.php"; 
			require_once(LIB . DS . "Autoload.php");
			include_once(LIB . DS . "Functions.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<link rel="stylesheet" type="text/css" href="css/typografia.css"/>
	</head>
	<body>
		<div id="dashboard-wrap">
			<div class="box-content">
				<div class="inside">
					<form method="post" enctype="multipart/form-data" action="upload.php">
						<fieldset>
							<legend>Anexos</legend>
								<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
								<input type="hidden" name="nomeArquivo" value="<?php echo "Anexo_" . $_GET["id"] . "_" . date("dmYHms"); ?>">
								<div style="text-align:left;">
									<p><strong>Tipo do Anexo</strong></p>
									<select name="tipo" id="tipo">
										<option id="exameAdmissional" <?php echo ($_GET["tipo"] == 0) ? "selected='selected'" : ""; ?> value="0">Exame Admissional</option>
										<option id="exameDemissional" <?php echo ($_GET["tipo"] == 1) ? "selected='selected'" : ""; ?> value="1">Exame Demissional</option>
										<option id="contratoEstagio" <?php echo ($_GET["tipo"] == 2) ? "selected='selected'" : ""; ?> value="2">Contrato de Estagio</option>
										<option id="valeTransporte" <?php echo ($_GET["tipo"] == 3) ? "selected='selected'" : ""; ?> value="3">Vale Transporte</option>
										<option id="valeAlimentacao" <?php echo ($_GET["tipo"] == 4) ? "selected='selected'" : ""; ?> value="4">Vale Alimenta&ccedil;&atilde;o</option>
									</select>
								</div>
								<div style="text-align:left;">
									<p><strong>Selecione um Arquivo </strong></p>
									<input type="file" id="arquivo" name="arquivo" value="">
								</div>
								<input type="submit" class="button left" value=" Cadastrar " />
						</fieldset>
					</form>
				</div><!--fim div inside-->
			</div><!--fim div box-->
		</div><!--fim div dashboard-wrap-->
	</body>
</html>