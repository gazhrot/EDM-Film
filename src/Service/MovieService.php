<?php
// src/Service/MovieService.php
namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;

class MovieService
{
    public function ParseMovieFromXml($path)
    {
        $movies = [];
        $crawler = new Crawler();
        $crawler->addXmlContent(file_get_contents($path));

        $id = $crawler->filter('id')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $title = $crawler->filter('title')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $genre = $crawler->filter('genre')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $description = $crawler->filter('description')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $director = $crawler->filter('director')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $year = $crawler->filter('year')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $runtime = $crawler->filter('runtime')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $rate = $crawler->filter('rate')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        for ($i = 0; $i < count($id); $i++) {
            
            array_push($movies, [
                'id' => $id[$i],
                'title' => $title[$i],
                'genre' => $genre[$i],
                'description' => $description[$i],
                'director' => $director[$i],
                'year' => $year[$i],
                'runtime' => $runtime[$i],
                'rate' => $rate[$i]
            ]);
        }

        $this->ImportMovie($movies);
    }

    public function ImportMovie(Array $movies)
    {
        
    }
}