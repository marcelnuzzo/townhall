<?php

namespace App\Controller;

use App\Entity\Structure;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ViePratiqueController extends AbstractController
{
    /**
     * @Route("/NumerosUtiles", name="NumerosUtiles")
     */
    public function NumerosUtiles(): Response
    {
        return $this->render('vie_pratique/NumerosUtiles.html.twig', [
            'controller_name' => 'ViePratiqueController',
        ]);
    }
    /**
     * @Route("/Commerces", name="Commerces")
     */
    public function Commerces(Structure $infrastructure, EntityManagerInterface $manager): Response
    {
        $infrastructure = $manager->getRepository(Structure::class)->find($id);
		$render = $_route=="structure_show" ? 'structure/show.html.twig' : 'structure/showpublic.html.twig';
		return $this->render($render, [
            'infrastructure' => $infrastructure,
			'id' => $id,
	        'structure' => $infrastructure->getOrganizationType(),
        ]);
    }
    /**
     * @Route("/Transports", name="Transports")
     */
    public function Transports(): Response
    {
        return $this->render('vie_pratique/Transports.html.twig', [
            'controller_name' => 'ViePratiqueController',
        ]);
    }
     /**
     * @Route("/Dechets", name="Dechets")
     */
    public function Dechets(): Response
    {
        return $this->render('vie_pratique/Dechets.html.twig', [
            'controller_name' => 'ViePratiqueController',
        ]);
    }
    /**
     * @Route("/Demarches", name="Demarches")
     */
    public function Demarches(): Response
    {
        return $this->render('vie_pratique/Demarches.html.twig', [
            'controller_name' => 'ViePratiqueController',
        ]);
    }
    /**
     * @Route("/Cimetiere", name="Cimetiere")
     */
    public function Cimetiere(): Response
    {
        return $this->render('vie_pratique/Cimetiere.html.twig', [
            'controller_name' => 'ViePratiqueController',
        ]);
    }
}
