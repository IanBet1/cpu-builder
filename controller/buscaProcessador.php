<?php
	include ('../controller/buscaCategoria.php');
	//include ('../controller/leitorJson.php');
	//include ('../model/componenteProcessador.php');

	//Buscar Categoria no Banco
	$idCategoria = new buscaCategoria('processador');
	echo $idCategoria -> retornaCategoria();
	//Enviar Categoria para o Leitor JSON

	//Receber Tabela de Retorno do Leitor

	//Montar Tabela com jQuery
?>
