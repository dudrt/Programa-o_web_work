<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia Prima</title>
    <style>@import url(style_materia.css);</style>
</head>
<body>
<script src="scrips_materia.js"></script>
<a href="http://localhost/trabalho_gestao/"><button class='back'>Voltar para o Menu!</button></a><br><br>
<div class='prod'>
<form action="add_materia.php" method='post'>
    <h1>Adicionar Matéria Prima</h1>
    <input type="text" placeholder='Matéria Prima' name='materia'>
    <input type="number" placeholder='Quantidade' name='quant'><br>
    <input type="submit" value='Adicionar' class='butt'>
</form>
</div>
<div class='prod'><form action="mod_materia.php" method='post'>
    <h1>Modificar Matéria Prima</h1>
    <input type="number" placeholder='ID' name='mod_id'>
    <input type="number" placeholder='Quantidade' name='mod_quant'><br>
    <input type="submit" value='Modificar' class='butt'>
</form>
</div>
<div class='prod'>
<form action="del_materia.php" method='post'>
    <h1>Excluir Matéria Prima</h1>
    <input type="number" placeholder='ID' name='del_id'>
    Confirmar<input type="checkbox" name='confirmar' onclick="confirma()"><br>
    <div id='add_submit'></div>
</form>
</div>
<br>
<br>
<div class="main_div">
<table class="mostrar">
    <tr class="linha">
    <td class="coluna">ID</td>
    <td class="coluna">Matéria Prima</td>
    <td class="coluna">Montante</td>
    </tr>
    
<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$result_cadastros = "SELECT * FROM materia_prima";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<tr class="linha">
                <td class="coluna">'.$rows["id"].'</td>
                <td class="coluna">'.$rows["nome_material"].'</td>
                <td class="coluna">'.$rows["quantidade"].'</td>
                </tr>';
}
echo '</table></details></div></body></html>';
?>