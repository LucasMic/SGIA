<style type="text/css">
    .column { width: 50%; float: left; padding-bottom: 10px; }
    .big { width: 50%; float: left; padding-bottom: 10px; } 
    .u {width: 100%; float: inherit; padding-bottom: 10px;}  
    .portlet { margin: 0 2em 2em 0; }
    .portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
    .portlet-header .ui-icon { float: right; }
    .portlet-content { padding: 0.4em; }
    .ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
    .ui-sortable-placeholder * { visibility: hidden; }
</style>
<!-- colaboradores = Colaborador::listarFuncioanriosPendentes($_SESSION['sede']);-->

<script type="text/javascript">
$(document).ready(function($){

$("#dadosPendentes").change(function(){
    id =  parseInt($("#dadosPendentes").val());		
    if(id != 0){
            window.location.href = "recursosHumanos/ver/"+id;
    }
});          

$("#documentosPendentes").change(function(){
    id =  parseInt($("#documentosPendentes").val());		
    if(id != 0){
            window.location.href = "recursosHumanos/ver/"+id;
    }
});

$("#renovacoesPendentes").change(function(){
    id =  parseInt($("#renovacoesPendentes").val());		
    if(id != 0){
            window.location.href = "recursosHumanos/ver/"+id;
    } 
});
        
});
</script>
		

<div id="dashboard-wrap">	
    <div class="metabox"></div>
    <div class="clear"></div>
    <div class="box-content">
        <div class="box">
            <div class="table">
                <div class="inside">
                    <form name="tipoColaborador" id="tipoColaborador" method="get">                                                    
                            <div id="portlets">                                
                                <div class="column big">
                                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                                        <div class="portlet-header ui-widget-header ui-corner-all">INFORMAÇÕES 1</div>
                                        <div class="portlet-content">
                                        </div>
                                    </div>
                                                                        
                                </div>
                                <div class="column">
                                    
                                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                                        <div class="portlet-header ui-widget-header ui-corner-all">INFORMAÇÕES 2</div>
                                        <div class="portlet-content">
                                        </div>
                                    </div>                                    

                                </div>
                            </div>                                                    
                    </form>       
                                 
                </div><!--fim div inside-->
            </div><!--fim div table-->
            
            <div class="table-footer">
            	           	
            </div>
        </div><!--fim div box-->
    </div><!--fim div box-content-->        
</div><!--fim div dashboard-wrap-->
    <div class="u">
        <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
            <div class="portlet-header ui-widget-header ui-corner-all">INFORMAÇÕES 3
            </div>
            <div class="portlet-content">
            </div>
        </div>
    </div>
