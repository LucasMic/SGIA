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
				if(Acao::checarPermissao(1, $classname::MODULO)){
				?>
					<li>
						<a tabindex="1" href="<?php echo $modulo->getLink() ?>">
							<?php echo $modulo->getNome() ?>
						</a>
					</li>
					<?php
				}
			}
		
		}catch(ListaVazia $e){}
		?>
	<li>
		<a tabindex="1" href="logout">Sair</a>
	</li>
</nav>
</ul>