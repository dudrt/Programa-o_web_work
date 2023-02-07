<?php

include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$id=$_POST['id'];
$status=$_POST['status'];

$sql="UPDATE pedido SET entrega='$status' WHERE id=$id";

if(mysqli_query($banco,$sql)){
    $newURL='pedidos.php';
    header('Location: '.$newURL);

    }else{
    echo "Erro ao modificar, contate o administrador!<br>";
    echo '<html><a href="estoque.php">Voltar para a página anterior</a></html>';

    }
    mysqli_close($banco);

    
?>

