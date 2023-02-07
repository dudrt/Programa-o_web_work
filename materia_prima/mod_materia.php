<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$quant=$_POST['mod_quant'];
$id=$_POST['mod_id'];
$sql="UPDATE materia_prima SET quantidade=$quant WHERE id=$id";
 

if(mysqli_query($banco,$sql)){
    $newURL='materia_prima.php';
    header('Location: '.$newURL);
    }else{
    echo "Erro, contate o administrador";
    echo '<html><a href="materia_prima.php">Voltar para a página anterior</a></html>';
    }
    mysqli_close($banco);

?>