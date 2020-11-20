<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemarcheController extends AbstractController
{
      /**
      * @Route("/Demarche")
      */

    public function number(): Response
    {
       

        return $this->render('demarche/demarche.html.twig', [
            'controller_name' => 'DemarcheController',
        ]);
    }
}