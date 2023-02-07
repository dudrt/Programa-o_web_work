<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pedido</title>
    <style>@import url(style_pedido.css);</style>

</head>
<body>
    <a href="pedidos.php"><button class="back">Voltar</button></a><br>
    <center>
    <div class="menu_pedido">
    <form action="add_db_pedido.php" method='post'>
        <label for="">Informações do Pedido</label><br>
        <input type="number" placeholder='CPF' name="cpf"><br>
        <input type="number" placeholder='ID do Produto' name="id_produto"><br>
        <input type="number" placeholder='Quantidade de Produtos' name="quant_prod"><br>
        <input type="number" placeholder='Montante' name="montante"><br>
        <label for="">Local de entrega</label><br>
        <input type="number" id='cep' placeholder='CEP' name="cep" onkeyup="pegar_cep()" maxlength="8"><br>
        <input type="text" id='uf' placeholder='Estado' name="estado"><br>
        <input type="text" id='cidade' placeholder='Cidade' name="cidade"><br>
        <input type="text" id='bairro' placeholder='Bairro' name="bairro"><br>
        <input type="text" id='rua' placeholder='Rua' name="rua"><br>
        <input type="text" placeholder='Nm Casa' name="nm_casa"><br>
        <input type="text" placeholder='Complemento' name="complemento"><br>
        <input type="submit" value="Adicionar"><br>
    </form>
   </div>
   </center>
   


<script src='script_pedido.js'></script>

<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM estoque";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
echo '<div class="main_div"><div>
<center><h2 class="titulo">Estoque</h2></center>
<table class="mostrar">
    <tr class="linha">
    <td class="coluna">id</td>
    <td class="coluna">Nome Produto</td>
    <td class="coluna">Quantidade</td>
    </tr>';
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<tr class="linha">
                <td class="coluna">'.$rows["id"].'</td>
                <td class="coluna">'.$rows["nome_produto"].'</td>
                <td class="coluna">'.$rows["quant"].'</td>
                </tr>';
}
echo '</table></div></body>
</html>';



?>