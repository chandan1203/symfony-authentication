<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\User;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    #[Route('/', name: 'dashboard')]
    public function index(): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $userRepository = $this->em->getRepository(User::class);
        $users = $userRepository->findAll();
        return $this->render('dashboard/index.html.twig',['users' => $users]);
    }
} 
