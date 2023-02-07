<?php
$servidor='localhost';//NOME DO SERVIDOR
$usuario = 'root';//TIPO DO USUÁRIO
$senha='';//SENHA DO BANCO DE DADOS
$dbname='logistica';//NOME DO BANCO DE DADOS
$banco = mysqli_connect($servidor,$usuario,$senha,$dbname);//FAZ A CONEXAO
    if(!$banco){
        die('ouve um erro: '.mysqli_connect_error());//AVISA SE DEU ERRO
    }
?>