<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PetitEnfanceController extends AbstractController
{
      /**
      * @Route("/PetiteEnfance")
      */

    public function number(): Response
    {
       

        return $this->render('petite_enfance/petite_enfance.html.twig', [
            'controller_name' => 'PetiteEnfanceController',
        ]);
    }
}