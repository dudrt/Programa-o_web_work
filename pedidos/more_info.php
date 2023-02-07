<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mais Informações</title>
    <style>@import url(style_pedido.css);</style>
</head>
<body>
    <a href="pedidos.php"><button class='back'>Voltar</button></a>
    <center>
    <form action="more_info.php" method='get'>
        <input type="number" placeholder='Id do Pedido' name='id_pedido' class='form_more'><br>
        <input type="submit" value="Pesquisar" name='submit' class='form_more' style='cursor:pointer;'>
    </form>
    </center>
    <br>
    <div class="mi_div"><div>
<center><h2 class="titulo">Pedido</h2></center>
<table class="mostrar">
    <tr class="linha">
    <td class="mi_coluna">ID Cliente</td>
    <td class="mi_coluna">Nome</td>
    <td class="mi_coluna">CPF/CNPJ</td>
    <td class="mi_coluna">ID do Pedido</td>
    <td class="mi_coluna">ID Produto</td>
    <td class="mi_coluna">Nome Produto</td>
    <td class="mi_coluna">Quantidade de Produtos</td>
    <td class="mi_coluna">Preço</td>
    
    <tr>
        <td class="mi_coluna" id='id_cliente'></td>
        <td class="mi_coluna" id='nome'></td>
        <td class="mi_coluna" id='cpf/cnpj'></td>
        <td class="mi_coluna" id='id_pedido'></td>
        <td class="mi_coluna" id='id_produto'></td>
        <td class="mi_coluna" id='nome_prod'></td>
        <td class="mi_coluna" id='quant_prod'></td>
        <td class="mi_coluna" id='preco'></td>
        
    </tr>
</table>
<center><h2 class='titulo'>Endereço</h2>
</center>
<div class='meio'>
<table class="mostrar">
    <tr>
    <tr class="linha">
    <td class="mi_coluna">CEP</td>
    <td class="mi_coluna">Estado</td>
    <td class="mi_coluna">Cidade</td>
    <td class="mi_coluna">Bairro</td>
    <td class="mi_coluna">Rua</td>
    <td class="mi_coluna">Nº Casa</td>
    <td class="mi_coluna">Comp.</td>
    <td class="mi_coluna">Entrega</td>
    </tr>
    <tr>
        <td class="mi_coluna" id='cep'></td>
        <td class="mi_coluna" id='estado'></td>
        <td class="mi_coluna" id='cidade'></td>
        <td class="mi_coluna" id='bairro'></td>
        <td class="mi_coluna" id='rua'></td>
        <td class="mi_coluna" id='nm_casa'></td>
        <td class="mi_coluna" id='comp'></td>
        <td class="mi_coluna" id='entrega'></td>
    </tr>
    </table></div>
</body>
</html>



<?php


include('C:\XAMPP\htdocs\trabalho_gestao\call_db.php');
$find=false;
if (isset($_GET["submit"], $_GET)){
    $id=$_GET['id_pedido'];
$result_cadastros = "SELECT * FROM pedido";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
if($rows['id']==$id){
    $find=true;
    $key=$rows['cpf_cnpj'];
    $key_prod=$rows['id_produtos'];
    echo '<script>
    document.getElementById("id_pedido").innerHTML="'.$id.'"
    document.getElementById("id_produto").innerHTML="'.$rows['id_produtos'].'"
    document.getElementById("quant_prod").innerHTML="'.$rows['quant_prod'].'"
    document.getElementById("preco").innerHTML="'.$rows['preco'].'"
    document.getElementById("entrega").innerHTML="'.$rows['entrega'].'"
    </script>';
}
}
if($find==false){
    echo '<script>document.getElementById("id_pedido").innerHTML="Não encontrado"</script>';
    return;
}
$result_cadastros = "SELECT * FROM cliente WHERE cnpj_cpf=$key";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<script>
    document.getElementById("id_cliente").innerHTML="'.$rows['id_cliente'].'"
    document.getElementById("cpf/cnpj").innerHTML="'.$rows['cnpj_cpf'].'"
    document.getElementById("nome").innerHTML="'.$rows['nome'].'"
    </script>';
}

$result_cadastros = "SELECT * FROM estoque WHERE id=$key_prod";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<script>
    document.getElementById("nome_prod").innerHTML="'.$rows['nome_produto'].'"
    </script>';
}


$result_cadastros = "SELECT * FROM endereco WHERE cpf_cnpj=$key";
$resultado_cadastros = mysqli_query( $banco, $result_cadastros);
while ( $rows = mysqli_fetch_array( $resultado_cadastros )){
    echo '<script>
    document.getElementById("cep").innerHTML="'.$rows['cep'].'"
    document.getElementById("estado").innerHTML="'.$rows['estado'].'"
    document.getElementById("cidade").innerHTML="'.$rows['cidade'].'"
    document.getElementById("bairro").innerHTML="'.$rows['bairro'].'"
    document.getElementById("rua").innerHTML="'.$rows['rua'].'"
    document.getElementById("nm_casa").innerHTML="'.$rows['nm_casa'].'"
    document.getElementById("comp").innerHTML="'.$rows['complemento'].'"
    </script>';
}
echo '</table></div></body></html>';
}





?>