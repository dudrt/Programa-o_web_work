<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$id_del=$_POST['id_del'];
$sql="DELETE FROM estoque WHERE id=$id_del";
if(mysqli_query($banco, $sql)){//testa se deu certo
    $newURL='estoque.php';
    header('Location: '.$newURL);
} else{
    echo "ERRO: $sql. <br>Contate um administrador!";
    echo '<html><a href="estoque.php">Voltar para a página anterior</a></html>';
}
mysqli_close($banco);
?>