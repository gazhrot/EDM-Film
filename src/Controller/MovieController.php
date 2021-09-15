<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index(): Response
    {
        $movies = $this->getDoctrine()->getRepository('App:Movie')->findAll();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/movie/{id}", name="movie_detail")
     */
    public function detail(String $id): Response 
    {
        $movie = $this->getDoctrine()->getRepository('App:Movie')->findOneBy(['id_movie' => $id]);

        return $this->render('movie/detail.html.twig', [
            'movie' => $movie,
        ]);
    }
}
