<?php
	include ('../controller/buscaCategoria.php');
	include ('../model/componentePlacaVideo.php');
	include ('../controller/leitorJson.php');

	$idCategoria = new buscaCategoria('placavideo');
	$leitorJson = new leitorJson($idCategoria -> retornaCategoria());
	$retorno = $leitorJson -> buscaProdutosPorCategoria();

	$placasvideo;
	$ofertas;
	
	foreach ($retorno['products'] as $product)
	{
		$placavideo = new componentePlacaVideo();
		$placavideo -> setIdComponente($product['id']);
		$placavideo -> setNomeComponente($product['name']);
		$placavideo -> setValorGeralMinComponente($product['priceMin']);
		$placavideo -> setValorGeralMaxComponente($product['priceMax']);
		$placavideo -> setComponenteBasico($product['thumbnail']['url']);

		$retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placavideo -> getIdComponente());
		foreach ($retornoEspecifico['products'] as $product)
		{
			$placavideo -> setMarcaComponente($product['technicalSpecification']['Marca']);
			$placavideo -> setMemComponente($product['technicalSpecification']['Memória']);
		}

		$retornoOferta = $leitorJson -> buscaOfertasDeProdutos($placavideo -> getIdComponente());
		foreach ($retornoOferta['offers'] as $offer)
		{
			$oferta = new lojaComponente();
			$oferta -> setLogoLoja($offer['store']['thumbnail']);
			$oferta -> setNomeLoja($offer['store']['name']);
			$oferta -> setValorLoja($offer['price']);
			$oferta -> setLinkLoja($offer['link']);

			$ofertas[] = $oferta;
		}
		$placavideo -> setLojaComponente($ofertas);
		$ofertas = null;

		$placasvideo[] = $placavideo;
	}
	var_dump($placasvideo);
?>
