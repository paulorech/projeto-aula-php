<?php
include '../comum/head.php';
include '../comum/side-menu.php';
?>

<div class="content-wrapper">
	<div class="container-fluid">
<?php
include "../comum/migalhas.php"
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>UF_ID</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listaCidades as $cidade) {?>
        <tr>
            <td><?php echo $cidade->cidade_id; ?></td>
            <td><?php echo $cidade->cidade_nome; ?></td>
            <td><?php echo "{$cidade->uf_nome} ({$cidade->uf_sigla})"; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>
</div>
<?php
include "..comum/footer.php";
?>