<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$material=$_POST['materia'];
$quant=$_POST['quant'];

$sql= "INSERT INTO materia_prima(nome_material,quantidade)
VALUES ('$material','$quant')"; 

if(mysqli_query($banco,$sql)){
    $newURL='materia_prima.php';
    header('Location: '.$newURL);
    }else{
    echo "Erro, contate o administrador";
    echo '<html><a href="materia_prima.php">Voltar para a página anterior</a></html>';
    }
    mysqli_close($banco);

?>