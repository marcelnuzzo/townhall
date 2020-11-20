<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TransportsController extends AbstractController
{
      /**
      * @Route("/Transports")
      */

    public function number(): Response
    {
       

        return $this->render('transports/transports.html.twig', [
            'controller_name' => 'TransportsController',
        ]);
    }
}