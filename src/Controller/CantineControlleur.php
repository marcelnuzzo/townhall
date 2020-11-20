<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CantineController extends AbstractController
{
      /**
      * @Route("/Cantine")
      */

    public function number(): Response
    {
       

        return $this->render('cantine/cantine.html.twig', [
            'controller_name' => 'CantineController',
        ]);
    }
}