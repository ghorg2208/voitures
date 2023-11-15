<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    #[Route('/vehicule/index', name: 'app_vehicule')]
    public function index(VehiculeRepository $vehiculeRepository): Response
{
    $vehicules = $vehiculeRepository->findAll();
    return $this->render('vehicule/index.html.twig', [
        'vehicules' => $vehicules,
    ]);
}

  #[Route("/vehicule/create", name: "vehicule_create")]

    public function create(Request $request, EntityManagerInterface $entityManager): Response
{
    $vehicule = new Vehicule();
    $form = $this->createForm(VehiculeType::class, $vehicule);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($vehicule);
        //dd($vehicule);
        $entityManager->flush();

        return $this->redirectToRoute('app_vehicule');
    }

    return $this->render('vehicule/create.html.twig', [
        'form' => $form->createView(),
    ]);
}


  #[Route("/vehicule/edit/{id}", name: "vehicule_edit")]


public function edit(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(VehiculeType::class, $vehicule);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();
        return $this->redirectToRoute('app_vehicule');
    }

    return $this->render('vehicule/edit.html.twig', [
        'form' => $form->createView(),
    ]);
}

 
  #[Route("/vehicule/delete/{id}", name: "vehicule_delete")]


public function delete(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
{
    $entityManager->remove($vehicule);
    $entityManager->flush();

    return $this->redirectToRoute('app_vehicule');
}



}
