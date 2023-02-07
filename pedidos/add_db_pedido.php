<?php
include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');

$cpf=$_POST['cpf'];
$id_prod=$_POST['id_produto'];
$quant_pedido=$_POST['quant_prod'];
$montante=$_POST['montante'];
$cep=$_POST['cep'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$bairro=$_POST['bairro'];
$rua=$_POST['rua'];
$nm_casa=$_POST['nm_casa'];
$complemento=$_POST['complemento'];
$entrega="Em andamento";

if($complemento==''){
    $complemento='.';
}
if($cpf=="" || $cep=="" || $id_prod=="" ||$quant_pedido=="" || $montante=="" || $estado=="" || $cidade=="" || $bairro=="" || $rua=="" || $nm_casa==""){
    echo 'Preencha todos os campos!<br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}
$correto=false;
$result_cadastros="SELECT * FROM cliente";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['cnpj_cpf']==$cpf){
    $correto=true;
}
}
if($correto){

}else{
    echo 'Confira o CPF/CNPJ do cliente!<br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}

$prod_achou=false;
$result_cadastros = "SELECT * FROM estoque";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['id']==$id_prod){
    $prod_achou=true;
    $quantidade=$rows['quant'];
    
}
}
if($prod_achou){
    $quantidade=$quantidade-$quant_pedido;

}else{
    echo 'Confira o ID do produto!<br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}

if($quantidade<0){
    echo 'Confira a quantidade de produtos!<br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}else{
    $sql="UPDATE estoque SET quant=$quantidade WHERE id=$id_prod";
    if(mysqli_query($banco,$sql)){

    }else{
        echo 'Ocorreu um erro, entre em contato com um administrado!<br><br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    }
}


$sql="INSERT INTO pedido (cpf_cnpj,preco,id_produtos,quant_prod,entrega) 
VALUES('$cpf','$montante','$id_prod','$quant_pedido','$entrega')";
if(mysqli_query($banco,$sql)){
}else{
    echo 'Ocorreu um erro, entre em contato com um administrado!<br><br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}
$result_cadastros = "SELECT * FROM pedido";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['cpf_cnpj']==$cpf){
    $id=$rows['id'];
}
}
$sql="INSERT INTO endereco(id_pedido,cpf_cnpj,cep,estado,cidade,bairro,rua,nm_casa,complemento)
VALUES ('$id','$cpf','$cep','$estado','$cidade','$bairro','$rua','$nm_casa','$complemento')";

if(mysqli_query($banco,$sql)){
    echo 'Pedido Cadastrado com sucesso!<br><a href="pedidos.php"><button>Voltar Para a Pedidos</button></a>';
}else{
    echo 'Ocorreu um erro, entre em contato com um administrado!<br><br><a href="add_pedido.php"><button>Voltar Para a Pedidos</button></a>';
    return;
}



?>