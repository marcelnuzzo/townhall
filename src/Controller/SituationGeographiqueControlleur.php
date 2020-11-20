<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SituationGeographiqueController extends AbstractController
{
      /**
      * @Route("/SituationGeographique")
      */

    public function number(): Response
    {
       

        return $this->render('situation_geographique/situation_geographique.html.twig', [
            'controller_name' => 'SituationGeographiqueController',
        ]);
    }
}