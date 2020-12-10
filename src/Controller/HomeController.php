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

        $url = 'https://api.meteo-concept.com/api/forecast/daily?insee=95127';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','X-AUTH-TOKEN: fb47ee6ddf9d891c8d8f3a35ff58b95b83e8fbea4c59f48ee68201ebf945ab22'));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data !== false)
            $status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        if ($data !== false && $status === 200) {
            $decoded = json_decode($data);
            $city = $decoded->city;
            $forecasts = $decoded->forecast;
			echo $forecasts;
            $tmax = $forecasts[0]->tmax;
            $tmax2 = $forecasts[1]->tmax;
            $tmax3 = $forecasts[2]->tmax;


            $saturday = null;
            foreach ($forecasts as $k => $f) {
                $day = (new \DateTime($f->datetime))->format('w');
                if ($day == 6) {
                    $saturday = $k;
                    break;
                }
            }

            // print("Le week-end prochain est dans {$saturday} jours ! Les températures mini/maxi à {$city->name} seront :\n");
            // print("\tSamedi   : {$forecasts[$saturday]->tmin}°C/{$forecasts[$saturday]->tmax}°C\n");
            // print("\tDimanche : {$forecasts[$saturday+1]->tmin}°C/{$forecasts[$saturday+1]->tmax}°C\n");
        }

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