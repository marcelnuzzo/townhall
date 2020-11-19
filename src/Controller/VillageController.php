<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VillageController extends AbstractController
{
    /**
     * @Route("/village/history", name="village_history")
     */
    public function history(): Response
    {
        return $this->render('village/history.html.twig', [
            'controller_name' => 'VillageController',
        ]);
    }

    /**
     * @Route("/village/location", name="village_location")
     */
    public function location(): Response
    {
        return $this->render('village/location.html.twig', [
            'controller_name' => 'VillageController',
        ]);
    }
}
