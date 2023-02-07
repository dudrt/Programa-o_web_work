<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Clientes</title>
    <style>@import url(style_cliente.css);</style>
</head>
<body>
    <a href="cliente.html"><button>Voltar</button></a><br><br>
    <CENter>
<div class="main_div"><div>
<table class="mostrar">
    <tr class="linha">
    <td class="coluna">ID</td>
    <td class="coluna">Nome</td>
    <td class="coluna">CPF/CNPJ</td>
    </tr>
    
<?php
 include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM cliente";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<tr class="linha">
                <td class="coluna">'.$rows["id_cliente"].'</td>
                <td class="coluna">'.$rows["nome"].'</td>
                <td class="coluna">'.$rows["cnpj_cpf"].'</td>
                </tr>';
}
echo '</table></div></CENter></body></html>';
?>