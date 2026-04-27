<?php

namespace App\Controller;

use App\Entity\Carton;
use App\Form\CartonType;
use App\Repository\CartonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/carton')]
final class CartonController extends AbstractController
{
    #[Route(name: 'app_carton_index', methods: ['GET'])]
    public function index(CartonRepository $cartonRepository): Response
    {
        return $this->render('carton/index.html.twig', [
            'cartons' => $cartonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_carton_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carton = new Carton();
        $form = $this->createForm(CartonType::class, $carton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carton);
            $entityManager->flush();

            return $this->redirectToRoute('app_carton_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('carton/new.html.twig', [
            'carton' => $carton,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carton_show', methods: ['GET'])]
    public function show(Carton $carton): Response
    {
        return $this->render('carton/show.html.twig', [
            'carton' => $carton,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_carton_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Carton $carton, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CartonType::class, $carton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_carton_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('carton/edit.html.twig', [
            'carton' => $carton,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carton_delete', methods: ['POST'])]
    public function delete(Request $request, Carton $carton, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carton->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($carton);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_carton_index', [], Response::HTTP_SEE_OTHER);
    }
}
