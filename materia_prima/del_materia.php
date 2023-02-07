<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$id=$_POST['del_id'];
$sql="DELETE FROM materia_prima WHERE id=$id";

if(mysqli_query($banco,$sql)){
    $newURL='materia_prima.php';
    header('Location: '.$newURL);
}else{
    echo "Erro, contate o administrador";
    echo '<html><a href="materia_prima.php">Voltar para a página anterior</a></html>';
    }
    mysqli_close($banco);

?>