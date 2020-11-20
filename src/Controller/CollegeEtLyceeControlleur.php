<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CollegeEtLyceeController extends AbstractController
{
      /**
      * @Route("/CollegeEtLycee")
      */

    public function number(): Response
    {
       

        return $this->render('college_et_lycee/college_et_lycee.html.twig', [
            'controller_name' => 'CollegeEtLyceeController',
        ]);
    }
}