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
        $url = 'https://api.meteo-concept.com/api/forecast/daily?token=7ce2ef43a824a607dc8229a85fa1e26af12f49ab6303179d57051350654fe72b&insee=95127';
        $data = file_get_contents($url);

        if ($data !== false) {
            $decoded = json_decode($data);

            $city = $decoded->city;
            $lat = $city->latitude;
            $long = $city->longitude;

            $forecast = $decoded->forecast;
            $tmax1 = $forecast[0]->tmax;
            $tmax2 = $forecast[1]->tmax;
            $tmax3 = $forecast[2]->tmax;
            $date = $forecast[10]->datetime;
        }
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tmax1' => $tmax1,
            'tmax2' => $tmax2,
            'tmax3' => $tmax3,
            'lat' => $lat,
            'long' => $long,
            'date' => $date           
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
     * @Route("/user/administration", name="home_admin")
     */
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig');
    }
	
	/**
     * @Route("/situation-geographique", name="home_situationgeographique")
     */
    public function situationgeographique(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/les-elus", name="home_leselus")
     */
    public function leselus(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/conseil-municipale", name="home_conseil")
     */
    public function conseil(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/numeros-utiles", name="home_numerosutiles")
     */
    public function numerosutiles(): Response
    {
        return $this->render('vie_pratique/NumerosUtiles.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/dechets", name="home_dechets")
     */
    public function dechets(): Response
    {
        return $this->render('vie_pratique/Dechets.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/demarches", name="home_demarches")
     */
    public function demarche(): Response
    {
        return $this->render('vie_pratique/Demarches.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
	
	/**
     * @Route("/cimetiere", name="home_cimetiere")
     */
    public function cimetiere(): Response
    {
        return $this->render('vie_pratique/Cimetiere.html.twig', [
            'controller_name' => 'HomeController',
        ]);
	}
	
	/**
     * @Route("/espace-culturel", name="home_espaceculturel")
     */
    public function espaceculturel(): Response
    {
        return $this->render('vie_associative_et_culturelle/EspaceCulturelle.html.twig', [
            'controller_name' => 'HomeController',
        ]);
	}
	
	/**
     * @Route("/petite-enfance", name="home_petiteenfance")
     */
    public function petiteenfance(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/PetiteEnfance.html.twig', [
            'controller_name' => 'HomeController',
        ]);
	}
	
	/**
     * @Route("/caisse-d´s-ecoles", name="home_caissedesecoles")
     */
    public function caissedesecoles(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/CaisseDesEcoles.html.twig', [
            'controller_name' => 'HomeController',
        ]);
	}
	
	/**
     * @Route("/centre-de-loisirs", name="home_centreloisirs")
     */
    public function centreloisirs(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/CentreLoisirs.html.twig', [
            'controller_name' => 'HomeController',
        ]);
	}





}