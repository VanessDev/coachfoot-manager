<?php

namespace App\Controller;

use App\Repository\JoueurRepository;
use App\Repository\CartonRepository;
use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        JoueurRepository $joueurRepository,
        CartonRepository $cartonRepository,
        EquipeRepository $equipeRepository
    ): Response
    {
        return $this->render('home/index.html.twig', [
            'nbJoueurs' => $joueurRepository->count([]),
            'nbCartons' => $cartonRepository->count([]),
            'nbEquipes' => $equipeRepository->count([]),
            'joueursSuspendus' => $joueurRepository->findAll(), // on filtrera après dans Twig
        ]);
    }
}