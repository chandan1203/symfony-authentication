<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\User;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    #[Route('/dashbaord', name: 'movies')]
    public function index(): Response
    {
        $userRepository = $this->em->getRepository(User::class);
        $users = $userRepository->findAll();
        return $this->render('movies/index.html.twig',['users' => $users]);
    }
} 
