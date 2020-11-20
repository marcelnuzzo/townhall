<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CimetiereController extends AbstractController
{
      /**
      * @Route("/Cimetiere")
      */

    public function number(): Response
    {
       

        return $this->render('cimetiere/cimetiere.html.twig', [
            'controller_name' => 'CimetiereController',
        ]);
    }
}