<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NumerosUtilesController extends AbstractController
{
      /**
      * @Route("/NumerosUtiles")
      */

    public function number(): Response
    {
       

        return $this->render('numeros_utiles/numeros_utiles.html.twig', [
            'controller_name' => 'NumerosUtilesController',
        ]);
    }
}