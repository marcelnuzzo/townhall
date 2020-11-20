<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConseilsMunicipauxController extends AbstractController
{
      /**
      * @Route("/ConseilsMunicipaux")
      */

    public function number(): Response
    {
       

        return $this->render('conseils_municipaux/conseils_municipaux.html.twig', [
            'controller_name' => 'ConseilsMunicipauxController',
        ]);
    }
}