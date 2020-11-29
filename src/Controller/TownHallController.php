<?php

namespace App\Controller;

use App\Entity\TownHall;
use App\Form\TownHallType;
use App\Repository\TownHallRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\HttpFoundation\File\Exception\IniSizeFileException;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;

class TownHallController extends AbstractController
{

    /**
     * @Route("/user/townhall/new", name="townhall_new", methods={"GET","POST"})
     */
    public function townhall_new(Request $request): Response
    {
        $townHall = new TownHall();
        $form = $this->createForm(TownHallType::class, $townHall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($townHall);
            $entityManager->flush();

            return $this->redirectToRoute('townhall_show');
        }

        return $this->render('town_hall/new.html.twig', [
            'town_hall' => $townHall,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/townhall/show", name="townhall_show")
	 * @Route("/a-propos", name="townhall_showpublic")
     * @Route("/user/townhall/new", name="townhall_new", methods={"GET","POST"})
	 * @param $_route
     */
    public function townhall_show($_route,  TownHallRepository $repo, Request $request)
    {
        $exist = $repo->findAll();
        if(!$exist) {
            $townHall = new TownHall();
            $form = $this->createForm(TownHallType::class, $townHall);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($townHall);
                $entityManager->flush();

                return $this->redirectToRoute('townhall_show');
            }
            
            return $this->render('town_hall/new.html.twig', [
                'town_hall' => $townHall,
                'form' => $form->createView(),
            ]);
        } else {
            $firstId = $repo->findFirstId()[0]['id'];
            $townhall = $this->getDoctrine()->getRepository(TownHall::class)->find($firstId);
        
            $render = $_route=="townhall_show" ? 'town_hall/show.html.twig' : 'town_hall/showpublic.html.twig';
            return $this->render($render, [
                'town_hall' => $townhall,
            ]);
        }
    }

    /**
     * @Route("/user/townhall/edit/{id}", name="townhall_edit", methods={"GET","POST"})
     */
    public function townhall_edit(Request $request, TownHall $townHall): Response
    {
        $form = $this->createForm(TownHallType::class, $townHall);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('townhall_show');
        }

        return $this->render('town_hall/edit.html.twig', [
            'town_hall' => $townHall,
            'form' => $form->createView(),
        ]);
    }
	
	  /**
     * @Route("/histoire", name="townhall_story")
     */
    public function townhall_story(TownHallRepository $repo)
    {
        $firstId = $repo->findFirstId()[0]['id'];
        $townhall = $this->getDoctrine()->getRepository(TownHall::class)->find($firstId);
		return $this->render('town_hall/story.html.twig', [
            'town_hall' => $townhall,
        ]);
    }

 }