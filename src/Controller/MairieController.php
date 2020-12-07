<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MairieController extends AbstractController
{
    /**
     * @Route("/LesElus", name="LesElus")
     */
    public function LesElus(): Response
    {
        return $this->render('mairie/LesElus.html.twig', [
            'controller_name' => 'MairieController',
        ]);
    }
    /**
     * @Route("/ConseilsMunicipaux", name="ConseilsMunicipaux")
     */
    public function ConseilsMunicipaux(): Response
    {
        return $this->render('mairie/ConseilsMunicipaux.html.twig', [
            'controller_name' => 'MairieController',
        ]);
    }
}
