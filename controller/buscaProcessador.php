<?php
	include ('../controller/buscaCategoria.php');
	include ('../model/componenteProcessador.php');
	include ('../controller/leitorJson.php');

	//Buscar Categoria no Banco
	$idCategoria = new buscaCategoria('processador');

	//Enviar Categoria para o Leitor JSON
	$leitorJson = new leitorJson($idCategoria -> retornaCategoria());

	//Receber retorno do leitor
	$retorno = $leitorJson -> buscaProdutosPorCategoria();

	//Definindo propriedades básicas do componente
	$processadores;
	$ofertas;

	foreach ($retorno['products'] as $product)
	{
		//Definindo propriedades no objeto
		$processador = new componenteProcessador();
		$processador -> setIdComponente($product['id']);
		$processador -> setNomeComponente($product['name']);
		$processador -> setValorGeralMinComponente($product['priceMin']);
		$processador -> setValorGeralMaxComponente($product['priceMax']);
		$processador -> setComponenteBasico($product['thumbnail']['url']);

		//pegar especificações tecnicas
		$retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($processador -> getIdComponente());
		foreach ($retornoEspecifico['products'] as $product)
		{
			$processador -> setVelocidadeComponente($product['technicalSpecification']['Velocidade']);
			$processador -> setMarcaComponente($product['technicalSpecification']['Marca']);
		}
		$processador -> setNucleoComponente(0);

		//pegar ofertas do componente
		$retornoOferta = $leitorJson -> buscaOfertasDeProdutos($processador -> getIdComponente());
		foreach ($retornoOferta['offers'] as $offer)
		{
			$oferta = new lojaComponente();
			$oferta -> setLogoLoja($offer['store']['thumbnail']);
			$oferta -> setNomeLoja($offer['store']['name']);
			$oferta -> setValorLoja($offer['price']);
			$oferta -> setLinkLoja($offer['link']);

			$ofertas[] = $oferta;
		}
		$processador -> setLojaComponente($ofertas);
		$ofertas = null;

		//Adicionando objeto ao array
		$processadores[] = $processador;
	}
	var_dump($processadores);

	//Montar Tabela com jQuery
?>
