<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EcolePrimaireController extends AbstractController
{
      /**
      * @Route("/EcolePrimaire")
      */

    public function number(): Response
    {
       

        return $this->render('ecole_primaire/ecole_primaire.html.twig', [
            'controller_name' => 'EcolePrimaireController',
        ]);
    }
}