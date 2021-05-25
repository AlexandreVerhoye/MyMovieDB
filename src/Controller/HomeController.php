<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Movie;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $repoMovies;
    private $repoGenres;
    
    public function __construct(MovieRepository $repoMovies, GenreRepository $repoGenres) {
        $this->repoMovies = $repoMovies;
        $this->repoGenres = $repoGenres;

    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $movies = $this->repoMovies->findAll();
        $genres = $this->repoGenres->findAll();

        return $this->render('home/index.html.twig', [
            'movies'=> $movies, 'genres'=>$genres
        ]);
    }

    /**
     * @Route("/viewByGenre/{id}", name="viewByGenre")
     */
    public function viewByGenre(Genre $genre): Response
    {
        if(!$genre)
            return $this->redirectToRoute('home');

        return $this->render('home/index.html.twig', [
            'movies' => $genre->getMovies(), 'selectedGenre'=>$genre
        ]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about() : Response {
        return $this->render('home/about.html.twig');
    }
}
