<?php 
//define('DIR_DOWNLOAD', 'anexosCartaCredito/'); // NÃO VAI UTILIZAR POIS O CAMINHO DOS ANEXOS SERÃO DIFERENTES :)
 
$arquivo = $_GET['file'];
$diretorio = $_GET['caminho'];

if (stripos($arquivo, './') != false || stripos($arquivo, '../') != false || !file_exists($diretorio.$arquivo))
exit('Operação não permitida.');
 
$arquivo = $diretorio.$arquivo; // Aqui a gente s� junta o diret�rio com o nome do arquivo
 
header('Content-type: octet/stream');
header('Content-disposition: attachment; filename="'.basename($arquivo).'";');
header('Content-Length: '.filesize($arquivo));
readfile($arquivo);
exit;
?>