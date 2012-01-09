<script type="text/javascript">
	$(document).ready(function($){
		$('#login').focus();
		$('form').validate({
			messages: {
				login: { required: 'Digite seu login.' },
				senha: { required: 'Digite sua senha.' }
			}
		});
	});
</script>
<div id="user-login" class="inline-block" style="margin-top:0px;">
	<form method="post" action="logar" class="login">
	<ul>
		<li>
			<label for="login">Login</label> <br />
			<input type="text" id="login" name="login" value="" class="required" /><br />
		</li>
		<li>
			<label for="senha">Senha</label><br />
			<input type="password" id="senha" name="senha" value="" class="required" /> 
			
			<input type="submit" value="Entrar" class="btn-login"/>
		</li>
	</ul>
	</form>
</div>