<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnuaireDesAssosController extends AbstractController
{
      /**
      * @Route("/AnnuaireDesAssos")
      */

    public function number(): Response
    {
       

        return $this->render('annuaire-des-assos/annuaire-des-assos.html.twig', [
            'controller_name' => 'AnnuaireDesAssosController',
        ]);
    }
}