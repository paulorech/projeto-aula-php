<?php
include '../config.php';

if (!isset($post['nome']) || !$post['nome'] ) {
    $listaErros['nome'] = "Nome obrigatório.";

function removerMascaraCpf($cpf)
{
    //return preg_replace(["(",")"," ","'","."], [''], $valor);
    return preg_replace(["/\\D+/"], [''], $cpf);
}
function adicionarMascaraCpf($cpf)
{
    return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($cpf));
}
/*function validarEmail($email)
{
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email)) {
        return true;
    } else {
        return false;
    }
}*/
function validarCpf($cpf)
{
    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT); 
    //Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if ( strlen($cpf) != 11
        || $cpf == '00000000000'
        || $cpf == '11111111111'
        || $cpf == '22222222222'
        || $cpf == '33333333333'
        || $cpf == '44444444444'
        || $cpf == '55555555555'
        || $cpf == '66666666666'
        || $cpf == '77777777777'
        || $cpf == '88888888888'
        || $cpf == '99999999999') {
        return false;
    } else {
        // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}
/**
 * Valida formulario simples
 */
function validarFormularioSimples($post) 
{
    $listaErros = [];

    if (!isset($post['nome']) || !$post['nome'] ) {
        $listaErros['nome'] = "Nome obrigatório.";
    }
    if (!isset($post['segundo_nome']) || !$post['segundo_nome'] ) {
        $listaErros['segundo_nome'] = "Sobrenome obrigatório.";
    }

    return $listaErros;
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $listaErros = [];

    if (isset($_GET['edit']) && $_GET['edit'] == 1
        && isset($_GET['id']) && $_GET['id']) {
            $uf = select_one_db("SELECT id, nome, sigla FROM uf WHERE id = {$_GET['id']};");
        }

    include "cadastro-view.php";

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Utilizem o metodo validarFormularioSimples OU validarFormularioAvancado
    $listaErros = validarFormularioSimples($_POST);
    //$listaErros = validarFormularioAvancado($_POST, ['nome', 'email']);

    if (isset($_POST['id']) && $_POST['id'] )  {
        $uf = select_one_db("SELECT id, nome, sigla FROM uf WHERE id = {$_POST['id']}");
    }

    if (count($listaErros) > 0) {
        include "cadastro-view.php";

    } else if (isset($_POST['id']) && $_POST['id']) {

        $sigla = strtoupper($_POST['sigla']);
        // Executo o update
        $sql = "UPDATE uf 
            SET nome = '{$_POST['nome']}', 
            sigla = '{$sigla}'
            WHERE id = {$_POST['id']};
        ";
        $alterado = update_db($sql);

        //$_SESSION['msg_sucesso'] = "Cidade {$_POST['nome']} alterada com sucesso.";

        alertSuccess("Sucesso.", "Estado {$_POST['nome']} alterado com sucesso.");
        
        redirect("/modulo-estado/");
        
    } else {

        $sigla = strtoupper($_POST['sigla']);
        $sql = "INSERT INTO uf (nome, sigla)
            VALUES ('{$_POST['nome']}', '{$sigla}');";

        $estadoId = insert_db($sql);

        // Variaveis para controle de erros.
        $mensagemSucesso = '';
        $mensagemErro = '';

        if ($estadoId) {
            $mensagemSucesso = "Estado cadastrado com sucesso.";
        } else {
            $mensagemErro = "Erro inesperado.";
        }
        include "cadastro-view.php";
        
    }
}
?>