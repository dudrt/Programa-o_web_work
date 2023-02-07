<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$nome= $_POST['nome_prod'];
$quant=$_POST['quant'];

if($nome == '' || $quant==''){
    echo '<html>Nome ou Quantidade inexistente!
    <a href="estoque.php">Voltar para a página anterior</a></html>';
    return;

}


$sql="INSERT INTO estoque(nome_produto,quant)
VALUES('$nome','$quant')";

if(mysqli_query($banco,$sql)){
    $newURL='estoque.php';
    header('Location: '.$newURL);

    }else{
    echo "Erro ao adicionar, contate o administrador!";
    echo '<html><a href="estoque.php">Voltar para a página anterior</a></html>';

    }
    mysqli_close($banco);

?>