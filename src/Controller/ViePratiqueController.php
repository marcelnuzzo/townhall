<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function Commerces(): Response
    {
        return $this->render('vie_pratique/Commerces.html.twig', [
            'controller_name' => 'ViePratiqueController',
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
