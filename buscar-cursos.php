<?php

require 'vendor/autoload.php';



use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]); // crinado um novo cliente com o paramentro de não verificar o certificado
$resposta = $client -> request('GET','https://www.alura.com.br/cursos-online-programacao/php'); // fazendo um requisição do site

$html = $resposta -> getBody(); // obtendo o html do site

$crawler = new  Crawler($html); // criando um seletor para carapturar e maniputar o html;

$cursos =  $crawler -> filter('span.card-curso__nome'); // filtrar por um html e depois uma classe  os nomes;

foreach ($cursos as $curso ){ // percorrer por cada tag pega
    echo  $curso -> textContent.PHP_EOL; // como estão ainda em formato DOM forma em formato string
}



