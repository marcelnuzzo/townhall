<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LesElusController extends AbstractController
{
      /**
      * @Route("/LesElus")
      */

    public function number(): Response
    {
       

        return $this->render('les_elus/historique.html.twig', [
            'controller_name' => 'LesElusController',
        ]);
    }
}