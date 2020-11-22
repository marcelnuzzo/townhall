<?php

namespace App\Controller;

use App\Entity\TownHall;
use App\Form\TownHallType;
use App\Repository\TownHallRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/townhall")
 */
class TownHallController extends AbstractController
{
    /**
     * @Route("/structure", name="townhall_index", methods={"GET"})
     */
    public function index(TownHallRepository $townHallRepository): Response
    {
        return $this->render('town_hall/index.html.twig', [
            'town_halls' => $townHallRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="town_hall_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $townHall = new TownHall();
        $form = $this->createForm(TownHallType::class, $townHall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($townHall);
            $entityManager->flush();

            return $this->redirectToRoute('townhall_index');
        }

        return $this->render('town_hall/new.html.twig', [
            'town_hall' => $townHall,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="townhall_show", methods={"GET"})
     */
    public function show(TownHall $townHall): Response
    {
        return $this->render('town_hall/show.html.twig', [
            'town_hall' => $townHall,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="town_hall_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TownHall $townHall): Response
    {
        $form = $this->createForm(TownHallType::class, $townHall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('townhall_index');
        }

        return $this->render('town_hall/edit.html.twig', [
            'town_hall' => $townHall,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="town_hall_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TownHall $townHall): Response
    {
        if ($this->isCsrfTokenValid('delete'.$townHall->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($townHall);
            $entityManager->flush();
        }

        return $this->redirectToRoute('town_hall_index');
    }
}
