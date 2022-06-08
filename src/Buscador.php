<?php

namespace Alura\BuscadorDeCursos;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;


class Buscador
{
    
    private $httpClient;

    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {

        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $resposta = $this -> httpClient -> request('GET', $url);
        $html = $resposta -> getBody();
        $this ->crawler -> addHtmlContent($html);
        $elementoCursos=  $this -> crawler -> filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementoCursos as $curso){
            $cursos[] = $curso -> textContent; // adição de elementos em uma string
        }

        return $cursos;
    }
}