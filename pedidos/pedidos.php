<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>@import url(style_pedido.css);</style>
</head>
<script src='script_pedido.js'></script>
<body>
    <a href="http://localhost/trabalho_gestao/"><button class='back'>Voltar para o Menu!</button></a>
    <h1>Área de Pedidos</h1><br>
    <div>
        <h2>Modificar Entrega</h2>
    <form action="mod_pedido.php" method='post' >
        <input type="number" name='id' placeholder="Id do Pedido" class='mod'>
        <select name="status" id="entrega" class='mod'>
        <datalist id='entrega'>
        <option value="A caminho">Escolha</option>
        <option value="A caminho">A caminho</option>
        <option value="Entregue">Entregue</option>
        <option value="Retornando">Retornando</option>
        </datalist>
        </select>
        <input type="submit" value='Modificar' class='mod'>
    </form>
    </div>
    <h2>Deletar</h2>
    <form action="dell_pedido.php" method='post'>
    <input type="number" name='id_del' class='deletar' placeholder='ID para Deletar'>
    <label for="">Confirmar</label><input type="checkbox" name='confirmar' onclick="confirma()" class="check"><br>
    <div id='add_submit'></div>
    </form>
    <h2>Adicionar</h2>
    <a href="add_pedido.php"><button class="back_ped">Adicionar Pedidos</button></a>
    <br>
    <h2>Mais Informações</h2>
    <a href="more_info.php"><button class="back_ped">Mais Informações</button></a>
    <h2>Pedidos</h2>
    <div class="div_mostrar">
<table class="mostrar">
    <tr class="linha">
    <td class="coluna">ID</td>
    <td class="coluna">CPF/CNPJ</td>
    <td class="coluna">Preço</td>
    <td class="coluna">ID do Produto</td>
    <td class="coluna">Quantidade Produto</td>
    <td class="coluna">Status Entrega</td>
    </tr>
    
<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM pedido";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<tr class="linha">
                <td class="coluna">'.$rows["id"].'</td>
                <td class="coluna">'.$rows["cpf_cnpj"].'</td>
                <td class="coluna">'.$rows["preco"].'</td>
                <td class="coluna">'.$rows["id_produtos"].'</td>
                <td class="coluna">'.$rows["quant_prod"].'</td>
                <td class="coluna">'.$rows["entrega"].'</td>
                </tr>';
}
echo '</table></details></div></body></html>';
?>