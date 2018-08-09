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
			<?php if (isset($uf)) {
				echo "Alterar pessoa: {$uf->nome}";
			} else {
				echo "Cadastrar Pessoa";
			}
			?>
		</div>

		<div class="card-body">
			<form action="<?php echo $SITE_URL . "/modulo-pessoa/cadastro-pessoa.php"; ?>" id="form-cadastro" method="POST">
				<!-- O input hidden "id" serve para enviar o ID do estado que 
					estamos editando para o PHP saber qual registro ele precisa 
					alterar. 
				-->
				<?php if (isset($uf)) { ?>
					<input type="hidden" name="id" value="<?php echo $uf->id; ?>" />
				<?php } ?>

				<div class="form-group">
					<div class="form-row ">
						<div class="col-md-6">
							<label for="nome">Nome</label>
							<input class="form-control" name="nome" id="nome" placeholder="Primeiro nome" type="text" value="<?php echo (isset($uf)) ? $pessoa->primeiro_nome : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="segundo_nome">Sobrenome</label>
							<input type="text" class="form-control" name="sobrenome" id="sobrenome" value="<?php echo (isset($uf)) ? $pessoa->segundo_nome : ''; ?>" placeholder="Sobrenome" />
							<?php echo exibirErro($listaErros, 'sigla'); ?>
						</div>
						<div class="col-md-6">
							<label for="email">Email</label>
							<input class="form-control" name="email" id="email" placeholder="Email" type="text" value="<?php echo (isset($uf)) ? $pessoa->email : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="cpf">CPF</label>
							<input class="form-control" name="cpf" id="cpf" placeholder="CPF" type="text" value="<?php echo (isset($uf)) ? $pessoa->cpf : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="endereco">Endereço</label>
							<input class="form-control" name="endereco" id="endereco" placeholder="Endereço" type="text" value="<?php echo (isset($uf)) ? $pessoa->endereco : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="bairro">Bairro</label>
							<input class="form-control" name="bairro" id="bairro" placeholder="Bairro" type="text" value="<?php echo (isset($uf)) ? $pessoa->bairro : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="endereco">Número</label>
							<input class="form-control" name="numero" id="numero" placeholder="Número da residência" type="text" value="<?php echo (isset($uf)) ? $pessoa->numero : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="cep">CEP</label>
							<input class="form-control" name="cep" id="cep" placeholder="CEP do Endereço" type="text" value="<?php echo (isset($uf)) ? $pessoa->cep : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
						<div class="col-md-6">
							<label for="uf">Estado</label>
							<select class="form-control" name="uf" id="uf" >
								<option value="">Selecione um estado</option>
								<?php
								foreach ($listaUf as $uf) {
									$checked = '';
									if (isset($cidade) && $cidade->uf_id == $uf->id) {
										$checked = "selected";
									}
									echo "<option {$checked} value=\"{$uf->id}\"> {$uf->nome} ({$uf->sigla})</option>";
									}
								?>
							</select>
							<?php echo exibirErro($listaErros, 'uf'); ?>
							
						</div>
						<div class="col-md-6">
							<label for="data_nascimento">Data de Nascimento</label>
							<input class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" type="text" value="<?php echo (isset($uf)) ? $pessoa->data_nascimento : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>

						</div>
						<div class="col-md-6">
							<label for="tipo">Tipo</label>
							<input class="form-control" name="tipo" id="tipo" placeholder="Tipo" type="text" value="<?php echo (isset($uf)) ? $pessoa->tipo : ''; ?>" />
							<?php echo exibirErro($listaErros, 'nome'); ?>
						</div>
					</div>
				</div>
					
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<button class="btn btn-success" type="submit">Salvar</button>
							<a href="/modulo-estado/">
								<button class="btn btn-default" type="button">Cancelar</button>
							</a>
							<?php if (isset($mensagemSucesso) && $mensagemSucesso) { ?>
								<span class="text-success"><?php echo $mensagemSucesso; ?></span>
							<?php } ?>
							
							<?php
								if (isset($mensagemErro) && $mensagemErro) {
									echo '<span class="text-danger">' . $mensagemErro . '</span>';
								}
							?>
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