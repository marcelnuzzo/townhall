<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DechetsController extends AbstractController
{
      /**
      * @Route("/Dechets")
      */

    public function number(): Response
    {
       

        return $this->render('dechets/dechets.html.twig', [
            'controller_name' => 'DechetsController',
        ]);
    }
}