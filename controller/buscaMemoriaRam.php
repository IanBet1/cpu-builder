<?php
	include ('../controller/buscaCategoria.php');
	include ('../model/componenteMemoriaRam.php');
	include ('../controller/leitorJson.php');

	$idCategoria = new buscaCategoria('memoriaram');
	$leitorJson = new leitorJson($idCategoria -> retornaCategoria());
	$retorno = $leitorJson -> buscaProdutosPorCategoria();

	$memoriasram;
	$ofertas;

	foreach ($retorno['products'] as $product)
	{
		$memoriaram = new componenteMemoriaRam();
		$memoriaram -> setIdComponente($product['id']);
		$memoriaram -> setNomeComponente($product['name']);
		$memoriaram -> setValorGeralMinComponente($product['priceMin']);
		$memoriaram -> setValorGeralMaxComponente($product['priceMax']);
		$memoriaram -> setComponenteBasico($product['thumbnail']['url']);

		$retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($memoriaram -> getIdComponente());
		foreach ($retornoEspecifico['products'] as $product)
		{
			$memoriaram -> setVelocidadeComponente($product['technicalSpecification']['Velocidade da Memória']);
			$memoriaram -> setCapacidadeComponente($product['technicalSpecification']['Capacidade']);
			$memoriaram -> setMarcaComponente($product['technicalSpecification']['Marca']);
			$memoriaram -> setTipoMemComponente($product['technicalSpecification']['Velocidade da Memória']);
		}

		$retornoOferta = $leitorJson -> buscaOfertasDeProdutos($memoriaram -> getIdComponente());
		foreach ($retornoOferta['offers'] as $offer)
		{
			$oferta = new lojaComponente();
			$oferta -> setLogoLoja($offer['store']['thumbnail']);
			$oferta -> setNomeLoja($offer['store']['name']);
			$oferta -> setValorLoja($offer['price']);
			$oferta -> setLinkLoja($offer['link']);

			$ofertas[] = $oferta;
		}
		$memoriaram -> setLojaComponente($ofertas);
		$ofertas = null;

		$memoriasram[] = $memoriaram;
	}
	var_dump($memoriasram);
?>
