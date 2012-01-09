<div class=" header-content">
    <h2 class="left">Concursos</h2>
    <?php
    require_once VIEW . DS . "default" . DS . "sede.php";
    ?>
</div>
<hr class="mrg-bottom_20"/>
<div class="mrg-bottom_20">
</div>
<div id="dashboard-wrap">
    <div class="metabox"></div>
    <div class="clear"> </div>
    <div class="box-content">
        <div class="box">
            <h3 style="font-family: 'ArialRoundedMTBoldRegular'; font-size:22px;">Consulta</h3>
            <p style="padding:10px 0">Cole abaixo o texto do resultado e escolha as opções de consulta:</p>
            <form name="consulta" method="post" action="concurso/consulta">
                <label for="sep0">Separador de resultados:</label>
                <input type="text" id="sep0" name="seps[]" value="" style="width: 10px;" />
                <br />
                <label for="sep1">Separador de parâmetros:</label>
                <input type="text" id="sep1" name="seps[]" value="" style="width: 10px;" />
                <br />
                <label>Parâmetros:</label>
                <br />
                <select name="params[]">
                    <option value="0">Selecione</option>
                    <option value="Nº de Inscrição">Nº de Inscrição</option>
                    <option value="CPF">CPF</option>
                    <option value="Nome">Nome</option>
                    <option value="Nota">Nota</option>
                </select>
                <select name="params[]">
                   <option value="0">Selecione</option>
                    <option value="Nº de Inscrição">Nº de Inscrição</option>
                    <option value="CPF">CPF</option>
                    <option value="Nome">Nome</option>
                    <option value="Nota">Nota</option>
                </select>
                <select name="params[]">
                    <option value="0">Selecione</option>
                    <option value="Nº de Inscrição">Nº de Inscrição</option>
                    <option value="CPF">CPF</option>
                    <option value="Nome">Nome</option>
                    <option value="Nota">Nota</option>
                </select>
                <textarea id="pdf" name="pdf" cols="138" rows="20" style="height:auto;"></textarea>
                <input type="submit" class="button right" id="submit" value=" Consultar " />
            </form>
        </div> <!--fim div box-->
    </div> <!--fim div box-content-->
</div><!--fim div dashboard-wrap-->
