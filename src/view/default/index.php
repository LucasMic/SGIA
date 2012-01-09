<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $this->getTitle() ?></title>
	<?php echo $this->getHtmlBase() . "\n"; ?>
	
	<!--CSS-->
	
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="css/typografia.css"/>
	<link type="text/css" href="css/cupertino/jquery.css" rel="stylesheet" />
	
	
	
	<!--JAVASCRIPT-->
 	<script type="text/javascript" src="lib/js/jquery.js"></script>
 	<script type="text/javascript" src="lib/fancybox/jquerymousewheelpack.js"></script>
 	<script type="text/javascript" src="lib/fancybox/jqueryeasingpack.js"></script> 
 	<script type="text/javascript" src="lib/fancybox/jqueryfancyboxpack.js"></script>
	<script type="text/javascript" src="lib/js/jquery.meio.mask.js"></script>
	<script type="text/javascript" src="lib/js/jquery-validate/jquery.validate.js"></script>	
	<script type="text/javascript" src="lib/js/jquery-tooltip/jquery.tooltip.js"></script>
	<script type="text/javascript" src="lib/js/ui/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="lib/js/validar_data.js"></script>
	
	
	
	<script src="lib/js/jquery.scrollTo-min.js" type="text/javascript"></script>
	<script src="lib/js/jquery.scrollTo.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="lib/fancybox/jqueryfancybox.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function($){

			$('input').setMask();
			$('.tooltip').tooltip({left: 5,top: -15,track: true,opacity: 1,showBody: ' - ',extraClass: 'tip'});	
			
		
		});
	</script>
</head>

<body class="admin">

	<div id="wrap" class="container">
		<div id="content">
		
			
			<header>
	        	<div class="header">
	            	<h1 class="left">SGIA</h1>
	            	<?php
						if($this->getUsuario()){
						?>
	                		<p class="left logado">
	                			<strong>Olá, 
	                					<?php echo $this->getUsuario()->getLogin(); ?>
            					</strong>
            					&nbsp; | &nbsp;
            					<a title="trocar senha" href="usuario/trocarSenha">
            						trocar senha
        						</a>
        						&nbsp; | &nbsp;
        						<a title="sair" href="logout">sair</a>
    						</p>
					<?php }?>
	            </div>
        	</header>
			
			<!--fim div head-->
			
			<div id="main">			
				 <div class="inline-block">
					<?php
						if($this->getUsuario()){
							include "menu.php";
						} else {
							include "login.php";	
						}
					?>
				</div>
							
				<div id="main-content" class="content">
					<div style="height:30px;margin-bottom:10px;margin-top:10px;">
                        <center>
                        	
                    		<?php 
                            if(isset($_SESSION['flash'])){
                    			?>
	                            <div id="flash" class="flash">
	                                <strong>
	                                    <?php echo $this->getFlash() . "\n";?>
	                                </strong>
	                            </div>
                        		<?php 
                        		unset($_SESSION['flash']);
                    		}
                        	?>
                        	
                        </center>
                    </div>
					<?php $this->getHtmlContent() . "\n"; ?>				
				</div>
				
			</div>
			<!--fim div main-->
		</div>
		<!--fim div content-->
	</div>
	<!--fim div wrap-->
	
	<footer>
        <div class="footer" style="margin-bottom:0px;">
        	<div class="container">
            	<p class="left">Entre em contato com o nosso suporte mande um email para: contato@idealizza.com.br<br />ou pelo telefone (81) 3426-1317</p>
                <a href="http://www.idealizza.com.br"><img class="right" src="img/logo-idealizza.png" alt="Sistema desenvolvido pela Idealizza" title="Sistema desenvolvido pela Idealizza" /></a>
            </div>
        </div>
    </footer><!-- footer -->
	
</body>
</html>