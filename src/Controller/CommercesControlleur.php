<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommercesController extends AbstractController
{
      /**
      * @Route("/Commerces")
      */

    public function number(): Response
    {
       

        return $this->render('commerces/commerces.html.twig', [
            'controller_name' => 'CommercesController',
        ]);
    }
}