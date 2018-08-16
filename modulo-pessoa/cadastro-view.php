<?php
include "../comum/head.php";
include "../comum/side-menu.php";
?>
<?php /* INICIO CONTEUDO */ ?>
<div class="content-wrapper">
	<div class="container-fluid">

		<?php
		include "../comum/migalhas.php";
		?>

	<div class="card">
		<div class="card-header">
        	<i class="fa fa-user"></i>
			<?php if (isset($pessoa)) {
				echo "Alterar pessoa: {$pessoa->nome}";
			} else {
				echo "Cadastrar Pessoa";
			}
			?>
		</div>

		<div class="card-body">
			<form action="<?php echo $SITE_URL . "/modulo-pessoa/cadastro-pessoa.php"; ?>" id="form-cadastro" method="POST">
				<!-- O input hidden "id" serve para enviar o ID da pessoa que 
					estamos editando para o PHP saber qual registro ele precisa 
					alterar. 
				-->
				<?php if (isset($pessoa)) { ?>
					<input type="hidden" name="id" value="<?php echo $pessoa->id; ?>" />
				<?php } ?>
				
					<div class="form-row ">
						<div class="col-md-6">
							<label for="tipo_professor">Professor</label>
							<input required name="tipo" id="tipo_professor" type="radio" value="1">
							<label for="tipo_aluno">Aluno</label>
							<input required name="tipo" id="tipo_aluno"  type="radio" value="2">
							<?php echo exibirErro($listaErros, 'tipo'); ?>
						</div>
					</div>
				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="primeiro_nome">Primeiro Nome</label>
							<input required class="form-control" name="primeiro_nome" id="primeiro_nome" placeholder="Primeiro nome" type="text" value="<?php echo (isset($pessoa)) ? $pessoa->primeiro_nome : ''; ?>" />
							<?php echo exibirErro($listaErros, 'primeiro_nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="segundo_nome">Sobrenome</label>
							<input required type="text" class="form-control" name="segundo_nome" id="segundo_nome" value="<?php echo (isset($pessoa)) ? $pessoa->segundo_nome : ''; ?>" placeholder="Sobrenome" />
							<?php echo exibirErro($listaErros, 'segundo_nome'); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="email">Email</label>
							<input required class="form-control" name="email" id="email" placeholder="Email" type="email" value="<?php echo (isset($pessoa)) ? $pessoa->email : ''; ?>" />
							<?php echo exibirErro($listaErros, 'email'); ?>
						</div>
						<div class="col-md-6">
							<label for="data_nascimento">Data de Nascimento</label>
							<input class="form-control datepicker" name="data_nascimento" id="data_nascimento" placeholder="__/__/____" type="text" autocomplete="disable" value="<?php echo (isset($pessoa)) ? $pessoa->data_nascimento : ''; ?>"  />
							<?php echo exibirErro($listaErros, 'data_nascimento'); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="endereco">Endereço</label>
							<input required class="form-control" name="endereco" id="endereco" placeholder="Endereço" type="text" value="<?php echo (isset($pessoa)) ? $pessoa->endereco : ''; ?>" />
							<?php echo exibirErro($listaErros, 'endereco'); ?>
						</div>
						<div class="col-md-6">
							<label for="bairro">Bairro</label>
							<input required class="form-control" name="bairro" id="bairro" placeholder="Bairro" type="text" value="<?php echo (isset($pessoa)) ? $pessoa->bairro : ''; ?>" />
							<?php echo exibirErro($listaErros, 'bairro'); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="endereco">Número</label>
							<input required class="form-control" name="numero" id="numero" placeholder="0000" type="text" value="<?php echo (isset($pessoa)) ? $pessoa->numero : ''; ?>" />
							<?php echo exibirErro($listaErros, 'numero'); ?>
						</div>
						<div class="col-md-6">
							<label for="cep">CEP</label>
							<input required class="form-control" name="cep" id="cep" placeholder="_____-___" type="text" value="<?php echo (isset($pessoa)) ? $pessoa->cep : ''; ?>" />
							<?php echo exibirErro($listaErros, 'cep'); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="uf">Estado</label>
							<select class="form-control" name="uf" id="uf" >
								<option value="">Selecione um estado</option>
							</select>
							<?php echo exibirErro($listaErros, 'uf'); ?>
						</div>
						<div class="col-md-6">
							<label for="uf">Cidade</label>
							<select required class="form-control" name="cidade" id="cidade" >
								<option value="">Selecione uma cidade</option>
							</select>
							<?php echo exibirErro($listaErros, 'cidade'); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<button class="btn btn-success" type="submit">Salvar</button>
							<a href="/modulo-pessoa/">
								<button class="btn btn-default" type="button">Cancelar</button>
							</a>
						</div>
					</div>
				</div>
		</form>
		</div>

	</div>
</div>
<?php /* FIM CONTEUDO */ ?>

<?php
include "../comum/footer.php";
?>
<!-- O JS abaixo é utilizado somente nesta tela -->
<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',
		language: 'pt-BR'
	}).mask('00/00/0000');
});
</script>