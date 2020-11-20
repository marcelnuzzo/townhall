<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocationDeSalleController extends AbstractController
{
      /**
      * @Route("/LocationDeSalle")
      */

    public function number(): Response
    {
       

        return $this->render('location_de_salle/location_de_salle.html.twig', [
            'controller_name' => 'LocationDeSalleController',
        ]);
    }
}