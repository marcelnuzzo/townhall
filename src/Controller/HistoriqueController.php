<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HistoriqueController extends AbstractController
{
      /**
      * @Route("/Historique")
      */

    public function number(): Response
    {
       

        return $this->render('historique/historique.html.twig', [
            'controller_name' => 'HistoriqueController',
        ]);
    }
}