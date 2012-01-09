<script type="text/javascript">
	$(document).ready(function($){
		$("#ns").change(function(){
			document.sedeSelect.submit();
		});
		
	});
</script>

<form class="right" name="sedeSelect" id="sedeSelect" method="post" action="usuario/mudarSede">
	<select name="ns" id="ns" >
    <?php 
    	try{
    		$sedes = Sede::listar();
    		foreach($sedes as $sede){
    			if($sede->getId() == $_SESSION["sede"]){
    				$selected = "selected='selected'";
    			} else {
    				$selected = "";
    			}
    			?>
    			
    			<option <?php echo $selected; ?> value="<?php echo $sede->getId(); ?>" > <?php echo $sede->getNome(); ?> </option>
    		<?php
    		}
    		
    	}catch(ListaVazia $e){
    		echo "<option value='0'>Nenhuma sede encontrada no sistema</option>";
    	}
    ?>
    </select>
</form>