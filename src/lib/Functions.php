<?php
	/**
	 * Função formataData($data)
	 * Inverte o formato da data para o formato oposto
	 * Formatos válidos: dd/mm/YYYY ou YYYY-mm-dd
	 * @param $data
	 * @return string
	 */
	
	
	
	function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
	} 
	
	
	// valida cpf
	function isCpf($cpf){
        $cpf         = preg_replace("/[^0-9]/", "", $cpf);
        $digitoUm     = 0;
        $digitoDois = 0;
        
        for($i = 0, $x = 10; $i <= 8; $i++, $x--){
            $digitoUm += $cpf[$i] * $x;
        }
        for($i = 0, $x = 11; $i <= 9; $i++, $x--){
            if(str_repeat($i, 11) == $cpf){
                return false;
            }
            $digitoDois += $cpf[$i] * $x;
        }
        
        $calculoUm  = (($digitoUm%11) < 2) ? 0 : 11-($digitoUm%11);
        $calculoDois = (($digitoDois%11) < 2) ? 0 : 11-($digitoDois%11);
        if($calculoUm <> $cpf[9] || $calculoDois <> $cpf[10]){
            return false;
        }
        return true;
    }	
	
	
	
	
	
	function formataData($data){
		$temp = explode('/',$data);
		if(count($temp) == 3)
			return $temp[2] . "-" . $temp[1] . "-" . $temp[0];
		$temp = explode('-',$data);
		return (count($temp) == 3) ? $temp[2] . "/" . $temp[1] . "/" . $temp[0] : false;
	}
	
	function getAcaoAtual(){
		if(empty($_GET['url']))
			return 'index';
		return (count($temp = explode('/',$_GET['url'])) > 1) ? $temp[1] : 'index';
	}
	
	function gravandoValorNoBanco($valor){

		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);

		return $valor;
	}
	
	function dataextenso($data) {     
		$data = explode("-",$data);

		$dia = $data[2];
		$mes = $data[1];
		$ano = $data[0];

		switch ($mes){

			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "março"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;

		}
			$mes=strtolower($mes);
			return $dia." de ".$mes." de ".$ano;
	}
	
	
	function retornaData(){
		$data  = date("Y-m-d");
		$separador = explode("-", $data);
		$nova_data = $separador[2]."/".$separador[1]."/".$separador[0];
		return $nova_data; 
	}
	
	function valorMonetraioPorExtenso($valor=0, $maiusculas=false) { 
	    $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"); 
	    $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"); 
	
	    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"); 
	    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"); 
	    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove"); 
	    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove"); 
	
	    $z=0; 
	
	    $valor = number_format($valor, 2, ".", "."); 
	    $inteiro = explode(".", $valor); 
	    for($i=0;$i<count($inteiro);$i++) 
	        for($ii=strlen($inteiro[$i]);$ii<3;$ii++) 
	            $inteiro[$i] = "0".$inteiro[$i]; 
	
	    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2); 
	    for ($i=0;$i<count($inteiro);$i++) { 
	        $valor = $inteiro[$i]; 
	        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]]; 
	        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]]; 
	        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : ""; 
	
	        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru; 
	        $t = count($inteiro)-1-$i; 
	        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : ""; 
	        if ($valor == "000")$z++; elseif ($z > 0) $z--; 
	        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t]; 
	        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ").$r; 
	    } 
	
	         if(!$maiusculas){ 
	             return($rt ? $rt : "zero"); 
	         } else { 
	             return (ucwords($rt) ? ucwords($rt) : "Zero"); 
	         } 
	
	}	
	
	
	
	
	
	function gerarContratoMatricula($aluno, $curso){
		$pdf = new mPDF();	
		
		$pdf->debug = true;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: 'Times New Roman', Times, serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>
		<p align='center' style='font-size: 36px;font-weight: bold;font-family: 'Times New Roman', Times, serif;'>Contrato de Prestação de Serviços </p>
		<p align='center' style='font-size: 36px;font-weight: bold;font-family: 'Times New Roman', Times, serif;'>Educacionais</p>
		<p align='justify' style='font-family: 'Times New Roman', Times, serif'>Pelo presente instrumento  particular de CONTRATO DE SERVIÇOS EDUCACIONAIS, o COMPLEXO DE ENSINO RENATO  SARAIVA, sociedade pura simples, inscrito no CNPJ sob o nº 08.403.264/0001-06,  com sede na rua do Cupim, nº 44, Bairro das Graças, nesta cidade do Recife —  PE, doravante denomina CONTRATADA, neste ato representada pela sócio-gerente,  Guilherme Marzol Montandon Saraiva, brasileiro, solteiro, domiciliada nesta  cidade, e do outro lado a parte contratante com nome e qualificação se  encontram abaixo discriminados, e que doravante será denominada simplesmente  CONTRATANTE.</p>
		<div style='border:solid 1px #000000;margin-left:30px;margin-right:30px;padding:10px;'>
			<p><strong>DADOS DO CURSO E  QUALIFICAÇÃO DO CONTRATANTE</strong></p>
			<p><strong>CURSO:</strong>" .$curso->getNome() . "<br />
				<strong>VALOR PAGO DO CURSO:</strong>R$ ".number_format($curso->getValorPromocionalValido(), 2, ",", ".")."<br />
				<strong>DATA PREVISTA PARA INÍCIO:</strong> ". date('d/m/Y'). "<br />
				<strong>DATA DA ASSINATURA DO  CONTRATO:</strong> ". date('d/m/Y'). "
			</p>
			<p><strong>NOME:</strong> ". $aluno->getNome(). "<br />
				<strong>CPF:</strong> ". $aluno->getCpf(). "<br />
				<strong>RG:</strong> ". $aluno->getRg(). "<br />
				<strong>FONE:</strong>". $aluno->getTelefone1(). "
			</p>
		</div>
<p align='justify' style='font-family: 'Times New Roman', Times, serif'><br />
</p>
<p align='justify' style='font-family: 'Times New Roman', Times, serif'><strong>CLÁUSULA 1ª</strong> — O objeto deste contrato é a prestação de serviços educacionais referente à  participação do CONTRATANTE ou do beneficiário especificado no início deste  contrato a indicação pelo CONTRATANTE, no curso supramencionado, em  conformidade com o previsto neste instrumento e na Legislação em vigor.<br />
    <strong>PARÁGRAFO ÚNICO</strong> — A CONTRATADA se reserva ao direito de iniciar ou não as atividades do curso  se o número de inscritos para a turma e turno escolhidos não alcançar o mínimo  de 35 alunos.<br />
    <strong>CLÁUSULA 2ª</strong> — O presente contrato terá a duração necessária para o exaurimento da carga  horária do presente Curso. Nem CONTRATANTE nem CONTRATADA serão obrigados a  estabelecer um novo contrato, como nenhuma das partes será obrigada a fazer  aditamento a este contrato. Referente à prorrogação do período de duração do  mesmo. As partes são livres, só de comum acordo, poderão assinar um novo  contrato para um período de prestação de serviços educacionais.<br />
    <strong>PARÁGRAFO ÚNICO</strong> — A CONTRATADA, poderá por livre iniciativa e sem ônus para a CONTRATANTE,  prorrogar o término da prestação dos serviços ora estipulados, aumentando a  carga horária prevista inicialmente, a fim de proporcionar, segundo próprios  critérios didático-educacionais, melhores condições de aprendizagem do curso especificado.<br />
    <strong>CLÁUSULA 3ª</strong> — As aulas serão ministradas nas salas de aula da CONTRATADA, ou locais em que  a mesma indicar, tendo em vista a natureza do conteúdo e a técnica pedagógica  que se fizerem necessárias, inclusive alterando o calendário de aulas, que pdoerão  acontecer em quaisquer dias da semana, principalmente nos sábados, domingos e  feriados. Podendo até mesmo, ocorrer as aulas em turno diferente do contratado,  desde que de forma excepcionale a fim de antecipar o cumprimento da carga  horária acordada.<br />
    <strong>CLÁUSULA 4ª</strong> — A configuração do ato de matrícula se procede pelo preenchimento do  formulário próprio fornecido pela CONTRATADA, denominada FICHA DE INSCRIÇÃO  que, desde já, fica fazendo parte integrante deste contrato.<br />
    <strong>Parágrafo 1º</strong> — O CONTRATANTE ou o BENEFICIÁRIO indicado por ele, no caso de já estar vinculado  em cursos oferecidos pela CONTRATADA e deseja transferir-se para outro que  esteja sendo ministrado pela CONTRATADA, terá que pagar a diferença respectiva  acrescida de taxa de transferência, que corresponderá a uma parcela do  pagamento do curso especificado neste contrato.<br />
    <strong>l</strong> — A  transferência especificada neste parágrafo, apenas poderá ser concretizada,  caso haja disponibilidade de vagas no curso para qual se deseja transferir,  observando-se também o número de vagas que já estiverem reservadas.<br />
    <strong>CLÁUSULA 5ª</strong> — São de inteira responsabilidade da CONTRATADA o planejamento e a prestação dos  serviços, no que se refere à fixação de carga horária, designação de  professores, orientação didática-pedagógica e educacional, além de outras providências  que as atividades docentes exigirem, obedecendo a seu exclusivo critério, sem  ingerência do CONTRATANTE.<br />
    <strong>CLÁUSULA 6ª</strong> — Ao firmar o presente contrato, o CONTRATANTE submete-se ao Regimento Interno  do COMPLEXO DE ENSINO RENATO SARAIVA e a legislação em vigor.<br />
    <strong>CLÁUSULA 7ª</strong> — Como contraprestação pelos serviços educacionsis o CONTRATANTE pagará a CONTRATADA  a importância descriminada neste contrato.<br />
    <strong>CLÁUSULA 8ª</strong> — Não estão incluídos no valor estipulado na cláusula anterior qualquer tipo  dematerial didático, cópias, certidões, segunda via de cartão escolar para  controle de entrada no Estabelecimento, declarações e o certificado de  conclusão do curso.<br />
    <strong>CLÁUSULA 9ª</strong> — No caso de inadimplência, a CONTRATADA pode-á emitir documentos legais, acrescidos  dos juros de mora e multa dentro dos limites da legislação em vigor a partir do  vencimento da prestação, desde já autorizada pelo CONTRATANTE, para servir de  instrumento para efeito de cobrança extrajudicial e/ou judicial.<br />
    <strong>Parágrafo 1º</strong> — Fica convencionado que a partir de 30 (trinta) dias de inadimplência do<br />
  contratante a cobrança  poderá ser feita através de advogado, caso em que além dos juros e multa será  cobrado 20% (vinte) por cento de honorários advocatídos.<br />
  <strong>Parágrafo 2º</strong> — A CONTRATADA, nos casos de inadimplência, poderá utilizar-se de mecanismos de  proteção ao crédito para o exercício do seu direito de receber o que fora  pactuado na cláusula sétima, sem prejuízo de juros e multa, tendo, portanto, a  faculdade de incluir o nome do CONTRATANTE em cadastros de restrição ao  crédito.<br />
  <strong>CLÁUSULA 10ª</strong> — O(a) contratante expressamente autoriza o contratado a, livre de todos e qualquer  ônus, se utilizar da imagem do(a) mesmo(a), utilização de imagem esta que se  dará exclusivamente para fins de divulgação.<br />
  <strong>CLÁUSULA 11ª</strong> — Este Contrato poderá ser rescindindo pelo CONTRATANTE, através de desistência  formal do curso, e pela CONTRATADA, quando o beneficiário ou o CONTRATANTE afrontar  qualquer das cláusulas do presente contrato ou infringir qualquer norma do  Regimento Interno do COMPLEXO DE ENSINO RENATO SARAIVA.<br />
  <strong>Parágrafo 1º</strong> — A rescisão do contrato por parte do CONTRATANTE só será considerada a partir da  data em que este apresentar, em formulário próprio fornecido na Secretaria da CONTRATADA,  desistência formal do curso.<br />
  <strong>Parágrafo 2º</strong> — Uma vez rescindindo o contrato pelo CONTRATANTE nos moldes do parágrafo primeiro  desta cláusula.se a rescisão ocorrer após o início do curso o CONTRATANTE  pagará à CONTRATADA a carga horária dada até a data da rescisão mais uma taxa  administrativa no valor de 20% do restante do curso. Os valores correspondentes  às taxas administrativas referem-se a perdas e danos, decorrentes de prejuízos  causados pela reserva da vaga, hora-aula já contratada com os professores e  material de matrícula.<br />
  <strong>CLÁUSULA 12ª</strong> — As partes atribuem ao presente contrato pela eficácia e força executiva<br />
  extrajudicial.<br />
  <strong>CLÁUSULA 13ª</strong> — Para dirimir questões oriundas deste contrato, fica eleito o Foro da cidade  do Recife — PE. Por estarem justos e acordados, assinam presente instrumento em  duas vias com igual teor e forma, na presença das testemunhas abaixo, para que  se produzam todos os efeitos legais.</p>
  <p></p>
  <p></p>
  <p></p>
  <p></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recife, ".dataextenso(date('Y-m-d'))."
  <p></p>
  <p></p>
  <p></p>
  ________________________________________<p></p>
  ". $aluno->getNome()."
  <p></p>
  <p></p>
  <p></p>
  <p></p>
  <p style='font-family: 'Times New Roman', Times, serif'>Testemunhas</p>
  ________________________________________<p></p>
  ________________________________________<p></p>
  <p></p>
  <p></p>
  <p></p>
  <p></p>
  ________________________________________<p></p>
  <p style='font-family: 'Times New Roman', Times, serif'>Contratado</p>
";		
  
$pdf->WriteHTML($html);		
$pdf->Output("Matricula.pdf", "D");
} ?>