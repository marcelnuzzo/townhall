<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Structure;
use App\Form\StructureType;
use App\Repository\StructureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class StructureController extends AbstractController
{
    /**
     * @Route("/user/{structure}/index", name="structure_index")
     */
    public function structure_index($structure)
    {
        $structures = $this->getDoctrine()->getRepository(Structure::class)->findBy(['organization_type' => $structure]);
		return $this->render('structure/index.html.twig', [
            'structures' => $structures,
			'structure' => $structure,
        ]);
    }

    /**
     * @Route("/user/{structure}/new", name="structure_new")
     */
    public function structure_new($structure, Request $request)
    {
        $infrastructure = new Structure();
        $form = $this->createForm(StructureType::class, $infrastructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$infrastructure->setOrganizationType($structure);
			$structure->setCreatedat(date("Y-m-d H:i:s"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infrastructure);
            $entityManager->flush();

            return $this->redirectToRoute('message_index');
        }

        return $this->render('structure/new.html.twig', [
            'structure' => $structure,
			'infrastructure' => $infrastructure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{structure}/show", name="structure_show")
     */
    public function structure_show(Structure $structure): Response
    {
        return $this->render('structure/show.html.twig', [
            'structure' => $structure,
        ]);
    }

    /**
     * @Route("/user/{structure}/edit/{id}", name="structure_edit")
     */
    public function structure_edit(Request $request, Structure $structure): Response
    {
        $form = $this->createForm(StructureType::class, $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('structure_index');
        }

        return $this->render('structure/edit.html.twig', [
            'structure' => $structure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/delete/{id}", name="structure_delete", methods={"DELETE"})
     */
    public function structure_delete(Request $request, Structure $structure): Response
    {
        if ($this->isCsrfTokenValid('delete'.$structure->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($structure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('structure_index');
    }
}
