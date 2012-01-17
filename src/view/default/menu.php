<ul class="nav">
﻿<nav>
	<li>
		<a tabindex="1" href="">Início</a>
	</li>
	<?php
		try{
			$modulos = Modulo::listar();		
			foreach($modulos as $modulo) {
				$classname = $modulo->getLink() . "Controll";
				
				$teste = false;
				
				switch ($classname){
						
					case "perfilControll":
						if(Acao::checarPermissao(1, PerfilControll::MODULO)){
							$teste = true;
							}
						break;
						
					case "projetoControll":
						if(Acao::checarPermissao(1, ProjetoControll::MODULO)){
							$teste = true;
							}
						break;													

					case "usuarioControll":
						if(Acao::checarPermissao(1, UsuarioControll::MODULO)){
							$teste = true;
							}
						break;						
						}
						if($teste == true){
						
						?>
							<li>
								<a tabindex="1" href="<?php echo BASE; ?>/<?php echo $modulo->getLink() ?>">
									<?php echo $modulo->getNome();?>
								</a>
							</li>
						<?php
						
						}
			}
		
		}catch(ListaVazia $e){}
		?>
	<li>
		<a tabindex="1" href="<?php echo BASE; ?>/logout">Sair</a>
	</li>
</nav>
</ul>