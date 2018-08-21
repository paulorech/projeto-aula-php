<?php

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $listaErros = [];
    $mensagemSucesso = "";


    if (isset($_GET['delete']) && isset($_GET['id'])
        && $_GET['delete'] == '1' && $_GET['id']) {
        
        $pessoa = select_one_db("SELECT nome FROM pessoa WHERE id={$_GET['id']};");
        $quantidadeCidades = select_one_db("
            SELECT
                count(id) AS count
            FROM cidade
            WHERE
                uf_id = {$_GET['id']};
        ");
        
        if ($quantidadeCidades->count == 0) {
            $deletado = deletarRegistro($_GET['id'], 'pessoa');
        
            if ($deletado) {
                alertSuccess("Sucesso", " {$pessoa->primeiro_nome} removido com sucesso.");
            } else {
                alertError('Atenção!', "Erro ao remover pessoa.");
            }
        } else {
            alertError('Atenção!', "Existem {$quantidadeCidades->count} cidades para este estado. Remova todas as cidades antes de remover o estado.", 10000);
        }
        
        redirect('/modulo-pessoa/');
    }

    // Fazer a busca das cidades e exibir a pagina list.php
    $listaPessoas = select_db("
        SELECT 
            id,
            primeiro_nome,
            segundo_nome,
            email, 
            cpf, 
            endereco, 
            bairro,
            numero, 
            cep, 
            tipo, 

        FROM pessoa
        ORDER BY pessoa.nome ASC;
    ");
    
    include "list.php";

}


?>