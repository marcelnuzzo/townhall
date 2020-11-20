<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CaisseDesEcolesController extends AbstractController
{
      /**
      * @Route("/CaisseDesEcoles")
      */

    public function number(): Response
    {
       

        return $this->render('caisses_des_ecoles/caisses_des_ecoles.html.twig', [
            'controller_name' => 'CaisseDesEcolesController',
        ]);
    }
}