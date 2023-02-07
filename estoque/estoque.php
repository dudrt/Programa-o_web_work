<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>@import url(style_prod.css);</style>
</head>
<body>
    <a href="http://localhost/trabalho_gestao/"><button>Voltar para o Menu!</button></a>
    <br>
    <br>
    <div class='prod'>
    <form action="add_prod.php" method='post'>
        <h2>Adicionar Produtos</h2>
        <input type="text" placeholder='Nome do Produto' name='nome_prod'>
        <input type="number" placeholder='Quantidade' name='quant'><br>
        <input type="submit" value='Adicionar' style='cursor:pointer;'>
    </form>
    </div>
    <div class='prod'>
        <form action="mod_prod.php" method='post'>
        <h2>Modificar</h2>
        <input type="number" placeholder='ID do produto' name='id_mod'>
        <input type="number" placeholder='Quantidade' name='quant_mod'><br>
        <input type="submit" value='Modificar' style='cursor:pointer;'>
        </form>
    </div>
    <div class='prod'>
        <form action="del_produto.php" method='post'>
        <h2>Excluir</h2>
        <input type="number" placeholder='ID do produto' name='id_del'>
        Confirmar<input type="checkbox" name='confirmar' onclick="confirma()"><br>
        <div id='add_submit'></div>
        
        </form></div>
        <script src="script_prod.js"></script>
</body>
<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM estoque";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
echo '<div class="main_div"><div>

<h2 class="titulo">Estoque</h2>
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
echo '</table></div>';
?>