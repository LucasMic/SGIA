<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>SoftLuc Sistemas</title>
	<style type="text/css">
		body {
			background-color: #377dc4
		}
		div#aviso {
			margin-top: 80px;
			padding-top: 30px;
			padding-bottom: 30px;
			text-align: center;
			background-color: #fff;			
		}
		div#mensagem {
			padding-top: 50px;
			background-color: #377dc4;                        
			color: #fff;
			text-align: center;
			font-family: sans-serif;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div id="aviso">
		<img src="img/SoftLucLog.png" title="SoftLuc"/>
	</div>
	<div id="mensagem">
		<?php 
			if(!empty($GLOBALS["erro"]["msg"]))
				echo $GLOBALS["erro"]["msg"];
			if(!empty($GLOBALS['erro']['hora_publicacao']))
				echo " (Previsão de retorno: " . $GLOBALS['erro']['hora_publicacao'] . ")";
		?>		
	</div>	
</body>
</html>