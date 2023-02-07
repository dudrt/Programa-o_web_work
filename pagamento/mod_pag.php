<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$id=$_POST['id'];
$quant=$_POST['quant_mod'];
$docs=$_POST['docs_mod'];
$pend=$_POST['pendencia_mod'];
$conf=false;

$result = "SELECT * FROM pagamento";
$resultado_cadastros = mysqli_query( $banco, $result);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['id_cliente']==$id){
    $conf=true;
}
}
if($conf){  
    $sql="UPDATE pagamento SET montante=$quant, docs_necessarios='$docs', pendencias='$pend' WHERE id_cliente=$id";
    if(mysqli_query($banco,$sql)){
        $newURL='pagamento.php';
    header('Location: '.$newURL);
    
        }else{
        echo "Erro ao modificar!<br>ID incorreto ou erro no sistema são causas prováveis!<br>Caso persista, contate o administrador!<br>";
        echo '<html><a href="pagamento.php">Voltar para a página anterior</a></html>';
    
        }
        
}else{
    echo "Erro ao modificar!<br>ID incorreto ou erro no sistema são causas prováveis!<br>Caso persista, contate o administrador!<br>";
        echo '<html><a href="pagamento.php">Voltar para a página anterior</a></html>';
}

mysqli_close($banco);

?>