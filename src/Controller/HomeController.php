<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_default")
     * @Route("/accueil", name="home_index")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/accessibilité", name="home_accessibility")
     */
    public function accessibility(): Response
    {
        return $this->render('home/accessibility.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	
    /**
     * @Route("/administration", name="home_admin")
     */
    public function admin(): Response
    {
        return $this->render('home/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    

}
