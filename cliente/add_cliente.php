<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$nome = $_POST['nome'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$add=True;

$result_cadastros = "SELECT cnpj_cpf FROM cliente";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($cpf_cnpj == $rows['cnpj_cpf']){
    $add=False;
}
}

if($add){
$sql = "INSERT INTO cliente (cnpj_cpf,nome)
VALUES('$cpf_cnpj','$nome')";
if(mysqli_query($banco,$sql)){
    $newURL='cliente.html';
    header('Location: '.$newURL);
        }else{
        echo "Erro, contate o administrador";
        echo '<html><a href="cliente.html">Voltar para a página anterior</a></html>';
        }
        mysqli_close($banco);
}else{
    echo "Campo CPF/CNPJ duplicado!<br>";
    echo '<html><a href="cliente.html">Voltar para a página anterior</a></html>';
}

?>
