<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceCulturelleController extends AbstractController
{
      /**
      * @Route("/EspaceCulturelle")
      */

    public function number(): Response
    {
       

        return $this->render('espace_culturelle/espace_culturelle.html.twig', [
            'controller_name' => 'EspaceCulturelleController',
        ]);
    }
}