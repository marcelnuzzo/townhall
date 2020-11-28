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
use Doctrine\ORM\EntityManagerInterface;

class StructureController extends AbstractController
{
    /**
     * @Route("/user/{structure}/index", name="structure_index")
	 * @Route("/{structure}/index", name="structure_indexpublic")
	 * @param $_route
     */
    public function structure_index($_route, $structure)
    {
        $structures = $this->getDoctrine()->getRepository(Structure::class)->findBy(['organization_type' => $structure]);
		$render = $_route=="structure_index" ? 'structure/index.html.twig' : 'structure/indexpublic.html.twig';
		return $this->render($render, [
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
        $form = $this->createForm(StructureType::class, $infrastructure, [
            'structure' => $structure,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$infrastructure->setOrganizationType($structure);
			$infrastructure->setCreatedat(date("Y-m-d H:i:s"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infrastructure);
            $entityManager->flush();

            return $this->redirectToRoute('structure_index', ['structure' => $infrastructure->getOrganizationType() ]);
        }

        return $this->render('structure/new.html.twig', [
            'structure' => $structure,
			'infrastructure' => $infrastructure,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{structure}/show/{id}", name="structure_show")
	 * @Route("/{structure}/show/{id}", name="structure_showpublic")
	 * @param $_route
     */
    public function structure_show($_route, $id, Structure $infrastructure, EntityManagerInterface $manager)
    {
        $infrastructure = $manager->getRepository(Structure::class)->find($id);
		$render = $_route=="structure_show" ? 'structure/show.html.twig' : 'structure/showpublic.html.twig';
		return $this->render($render, [
            'infrastructure' => $infrastructure,
			'id' => $id,
        ]);
    }

    /**
     * @Route("/user/{structure}/edit/{id}", name="structure_edit")
     */
    public function structure_edit($structure, Request $request, Structure $infrastructure): Response
    {
        $form = $this->createForm(StructureType::class, $infrastructure, [
            'structure' => $structure,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$infrastructure->setOrganizationType($structure);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('structure_index', ['structure' => $infrastructure->getOrganizationType() ]);
        }

        return $this->render('structure/edit.html.twig', [
            'structure' => $structure,
			'infrastructure' => $infrastructure,
            'form' => $form->createView(),
        ]);
    }
	
	   //method to delete a user account
    /**
     * @Route("/user/{structure}/delete/{id}", name="structure_delete")
     */
		public function structure_delete($id, Request $request, $structure, EntityManagerInterface $manager)
    {
        $infrastructure = $manager->getRepository(Structure::class)->find($id);
        $manager->remove($infrastructure);
        $manager->flush();
        return $this->redirectToRoute('structure_index', [ 'structure' => $structure ]);
    }

}