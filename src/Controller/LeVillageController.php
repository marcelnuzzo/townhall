<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeVillageController extends AbstractController
{
    /**
     * @Route("/Historique", name="Historique")
     */
    public function Historique(): Response
    {
        return $this->render('le_village/Historique.html.twig', [
            'controller_name' => 'LeVillageController',
        ]);
    }
    /**
     * @Route("/SituationGeographique", name="SituationGeographique")
     */
    public function SituationGeographique(): Response
    {
        return $this->render('le_village/SituationGeographique.html.twig', [
            'controller_name' => 'LeVillageController',
        ]);
    }
}
