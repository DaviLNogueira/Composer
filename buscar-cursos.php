<?php

require 'vendor/autoload.php';





use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/','verify' => false]); //base encurta as uri para as chamadas futuras
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('cursos-online-programacao/php');

foreach ($cursos as $curso ){ // percorrer por cada tag pega
    echo  exibeMensagem($curso); // como estão ainda em formato DOM forma em formato string
}
