<script type="text/javascript">
	$(document).ready(function($){
        var convenios = 0;
        
        $("#convenios").hide();
        $(".convenios").hide();


        $(".button-delete").live('click', function(){
			$(this).parent().fadeOut("slow").delay(1000).queue(function() { $(this).remove(); });
		});

        $("#adicionarConvenio").click(function(){
            $("<ul style='margin-left:30px;'><label><strong>" + convenios +")</strong></label><input type='button' class='button-delete right' style='margin-bottom:-6px' value='x' /><li><p>Nome</p><input type='text' name='convenio[" + convenios + "][nome]' value='' class='required dadosConvenios' /></li><li><p>Valor (%)</p><input type='text' name='convenio[" + convenios + "][valor]' value='' class='required dadosConvenios' alt='decimal' /></li><hr></hr><br /></ul>").appendTo("#convenios");
            convenios++;
        });

		$(".radio").click(function(){
            if($(".radio:checked").val() == 1){
                $("#convenios").fadeIn();
                $(".convenios").fadeIn();
                $("#adicionarConvenio").click();

            } else {
                $("#convenios").hide();
                $(".convenios").hide();
                $("#convenios").remove();

            }
        });

        $("#submit").click(function(){
            if($(".radio:checked").val() == 1){
                if($(".dadosConvenios").val() == ""){
                    alert("Você selecionou a existência de convênio para esse curso. Favor preencha os dados do convênio.");
                    return false;
                }
            }
            return true;

        });

	});
</script>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Cadastro de Cursos</h2>
	</div>
	<br />
	<br />
	<hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"></div>
		<div class="box-content">
			<div class="box">
				<div class="table">
					<div class="inside">
						<form method="post" name="add">
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<p>Nome:</p>
										<input type="text" id="nome" name="nome" value="" class="required" />
									</li>
									<li>
										<p>Data de Encerramento:</p>
										<input type="text" id="dataEncerramento" name="dataEncerramento" value="" class="required" alt="date" />
									</li>
									<li>
										<p>Valor:</p>
										<input type="text" id="valor" name="valor" value="" class="required" alt="decimal" />
									</li>
                                    <li>
										<p>Data de Encerramento Promocional:</p>
										<input type="text" id="dataEncerramentoPromocional" name="dataEncerramentoPromocional" value="" class="required" alt="date" />
									</li>
									<li>
										<p>Valor Promocional:</p>
										<input type="text" id="valorPromocional" name="valorPromocional" value="" class="required" alt="decimal" />
									</li>
                                    <li>
                                        <p>Possui Convênio ?</p>
                                        <label><input type="radio" style="margin-top:15px;" name="tem_convenio" value="0" checked="checked" class="radio" />Não</label>
                                        <label><input type="radio" style="margin-top:15px;" name="tem_convenio" value="1" class="radio" />Sim</label>
                                        <br />
                                        <input type="button" id="adicionarConvenio" class="convenios" value="Adicionar Convênio" />
                                        <div id="convenios">
                                            
                                        </div>
                                    </li>
								</ul>
							</fieldset>
							<ul id="bts">
								<li>
									<input type="submit" class="button right" id="submit" value=" Cadastrar " />
									<input type="button" style="margin-right:5px;" class="button right" value="Voltar" onclick="location.href='voltar'" />
								</li>
							</ul>
						</form>
					</div><!--fim div inside-->
				</div><!--fim div table-->
				<div class="table-footer"></div>
			</div><!--fim div box-->
		</div><!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->
</div><!--fim div wrap-->