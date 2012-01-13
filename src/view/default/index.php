<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $this->getTitle() ?></title>
	<?php echo $this->getHtmlBase() . "\n"; ?>
	
	<!--CSS-->
	
	<link rel="shortcut icon" href="<?php echo BASE; ?>/img/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/css/typografia.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/css/cupertino/jquery.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/lib/fancybox/jqueryfancybox.css" media="screen" />
		
	<!--JAVASCRIPT-->
 	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery.js"></script>
 	<script type="text/javascript" src="<?php echo BASE; ?>/lib/fancybox/jquerymousewheelpack.js"></script>
 	<script type="text/javascript" src="<?php echo BASE; ?>/lib/fancybox/jqueryeasingpack.js"></script> 
 	<script type="text/javascript" src="<?php echo BASE; ?>/lib/fancybox/jqueryfancyboxpack.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery.meio.mask.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery-validate/jquery.validate.js"></script>	
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery-tooltip/jquery.tooltip.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/ui/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/validar_data.js"></script>	
        <script type="text/javascript" src="<?php echo BASE; ?>/lib/js/tiny_mce/jquery.tinymce.js"></script>
        
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery.scrollTo-min.js" ></script>
	<script type="text/javascript" src="<?php echo BASE; ?>/lib/js/jquery.scrollTo.js" ></script>
	
	<script type="text/javascript">
		$(document).ready(function($){
			$('input').setMask();
			$('.tooltip').tooltip({left: 5,top: -15,track: true,opacity: 1,showBody: ' - ',extraClass: 'tip'});				
		});
	</script>
        
        <!-- Load TinyMCE -->
       <script type="text/javascript">
	$().ready(function() {
            $('textarea.tinymce').tinymce({
                // Location of TinyMCE script
                script_url : '<?php echo BASE; ?>/lib/js/tiny_mce/tiny_mce.js',
                // General options
                theme : "advanced",
                language : "pt",
                plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

                // Theme options
                theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true,

                // Example content CSS (should be your site CSS)
                content_css : "<?php echo BASE; ?>/css/content.css"
            });
	});
</script>
        <!-- /TinyMCE -->
        
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
                    <p class="left">Entre em contato com o nosso suporte mande um email para: lucasmic@gmail.com<br />ou pelo telefone (81) 8649-6763</p>
                    <a href="http://www.google.com.br"><img class="right" src="img/logo-SoftLucLogBrancoPequeno.png" alt="Sistema desenvolvido por SoftLuc" title="Sistema desenvolvido por SoftLuc" /></a>
                </div>
            </div>
        </footer><!-- footer -->
	
</body>
</html>