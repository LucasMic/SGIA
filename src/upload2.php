<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php

include_once "constantes.php"; 
require_once(LIB . DS . "Autoload.php");
include_once(LIB . DS . "Functions.php");


$colaborador = Colaborador::buscar($_POST["id"]);

$tipo = $_POST["tipo"];
$data = formataData($_POST["data"]);


/////////////Configura��es //////////////////
$limitar_ext = "nao";
$extensoes_validas = array(".txt", ".TXT");
$caminho_absoluto = "anexos";
$limitar_tamanho = "nao";
$tamanho_bytes = "10000000";
$sobrescrever = "sim";
set_time_limit (0);
/////////////////////////////////////////////

///////////////Dados do Arquivo /////////////
$nome_arquivo = $_FILES['arquivo']['name'];
$tamanho_arquivo = $_FILES['arquivo']['size'];
$arquivo_temporario = $_FILES['arquivo']['tmp_name'];
/////////////////////////////////////////////


if (!empty ($nome_arquivo)){
	if ($sobrescrever == "nao" && file_exists("$caminho_absoluto/$nome_arquivo")){
		echo  "Arquivo j� existe.";
	}

	if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes)){
		echo  "Arquivo deve ter no m�ximo $tamanho_bytes bytes.";
	}

	$ext = strrchr($nome_arquivo,'.');
	
	if ($limitar_ext == "sim" && !in_array($ext,$extensoes_validas)){
		echo  "Extens�o de arquivo inv�lida para upload.";
	}

	$nome_arquivo = $_POST["nomeArquivo"] . $ext;
	if(move_uploaded_file($arquivo_temporario, $caminho_absoluto . DS . $nome_arquivo)) {
		$colaborador->addAnexos($colaborador->getId(), $data, $tipo, $nome_arquivo);
		?>
		<script type="text/javascript">
			alert("Anexo adicionado com sucesso.");
			window.location = "http://www.idealizza.net/gestor/recursosHumanos/ver/<?php echo $colaborador->getId(); ?>";
		</script>
		<?php
		
	} else {
		echo  "O arquivo n�o pode ser copiado para o servidor.";
	}


}else{
	echo "Selecione o arquivo a ser enviado";
}
?>