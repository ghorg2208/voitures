<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\MembreType;
use App\Repository\MembreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembreController extends AbstractController
{

      #[Route("/membre", name: "membre_list")]

    public function index(MembreRepository $membreRepository): Response
    {
        return $this->render('membre/index.html.twig', [
            'membres' => $membreRepository->findAll(),
        ]);
    }


      #[Route("/membre/create", name: "membre_create")]

    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Membre();
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('membre_list');
        }

        return $this->render('membre/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


      #[Route("/membre/edit/{id}", name: "membre_edit")]

    public function edit(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('membre_list');
        }

        return $this->render('membre/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }


      #[Route("/membre/delete/{id}", name: "membre_delete")]

    public function delete(Request $request, Membre $membre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membre->getIdMembre(), $request->request->get('_token'))) {
            $entityManager->remove($membre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('membre_list');
    }
}
