<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CentreLoisirController extends AbstractController
{
      /**
      * @Route("/CentreLoisir")
      */

    public function number(): Response
    {
       

        return $this->render('centre_loisir/centre_loisir.html.twig', [
            'controller_name' => 'CentreLoisirController',
        ]);
    }
}