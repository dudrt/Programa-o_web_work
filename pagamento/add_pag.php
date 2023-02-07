<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$iden=$_POST['identificador'];
$quant=$_POST['quant'];
$docs=$_POST['docs'];
$pendencia=$_POST['pendencia'];
$achou=false;

$result = "SELECT * FROM cliente";
$resultado_cadastros = mysqli_query( $banco, $result);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['cnpj_cpf']==$iden){
    $id_cliente=$rows['id_cliente'];
    $nome=$rows['nome'];
    $achou=true;
}
}
$duplicado=false;
$result = "SELECT * FROM pagamento";
$resultado_cadastros = mysqli_query( $banco, $result);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['cpf_cnpj']==$iden){
    $duplicado=true;
}
}

if($duplicado){
    echo'CPF/CNPJ duplicado<br>';
    echo '<html><a href="pagamento.php">Voltar para a página anterior</a></html>';
    return;
}

if($achou){
$sql = "INSERT INTO pagamento (cpf_cnpj,montante,docs_necessarios,pendencias,id_cliente,nome)
VALUES('$iden','$quant','$docs','$pendencia','$id_cliente','$nome')";
if(mysqli_query($banco,$sql)){
    $newURL='pagamento.php';
    header('Location: '.$newURL);
        }else{
        echo "Erro, contate o administrador";
        echo '<html><a href="pagamento.php">Voltar para a página anterior</a></html>';
        }
        mysqli_close($banco);
}else{
    echo "Cliente ainda não cadastrado!";
    echo '<html><a href="http://localhost/trabalho_gestao/cliente/cliente.html">Ir para a página de clientes</a><br>';
    echo '<a href="pagamento.php">Voltar para a página anterior</a></html>';
}
?>