<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
    <style>@import url(style_pag.css);</style>
</head>
<body>
    <a href="http://localhost/trabalho_gestao/"><button>Voltar Para o Menu</button></a><br>
<div class='pag'>
    <form action="add_pag.php" method='post'>
        <h2>Adicionar Pagamento</h2>
        <input type="number" placeholder='CPF/CNPJ' name='identificador'>
        <input type="number" placeholder='Montante' name='quant'>
        <input type="text" placeholder='Documentos' name='docs'>
        <input type="text" placeholder='Pendências' name='pendencia'><br>
        <input type="submit" value='Adicionar' class='submit'>
    </form>
    </div>
    <div class='pag'>
    <form action="mod_pag.php" method='post'>
        <h2>Modificar Pagamento</h2>
        <input type="number" placeholder='ID' name='id'>
        <input type="number" placeholder='Montante' name='quant_mod'>
        <input type="text" placeholder='Documentos' name='docs_mod'>
        <input type="text" placeholder='Pendências' name='pendencia_mod'><br>
        <input type="submit" value='Modificar' class='submit'>
    </form>
    </div>
    <br>
<div class="main_div"><div><details >
    
<summary class="mostrar_pagamentos">➡️Pagamentos</summary>
<table class="mostrar">
    <tr class="linha">
    <td class="coluna">ID</td>
    <td class="coluna">Nome</td>
    <td class="coluna">Montante</td>
    <td class="coluna">Documentos</td>
    <td class="coluna">Pendências</td>
    </tr>
    
<?php
 include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM pagamento";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<tr class="linha">
                <td class="coluna">'.$rows["id_cliente"].'</td>
                <td class="coluna">'.$rows["nome"].'</td>
                <td class="coluna">'.$rows["montante"].'</td>
                <td class="coluna">'.$rows["docs_necessarios"].'</td>
                <td class="coluna">'.$rows["pendencias"].'</td>
                </tr>';
}
echo '</table></details></div></body></html>';
?>