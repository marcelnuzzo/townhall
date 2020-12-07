<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnfanceJeunesseScolariteController extends AbstractController
{
    /**
     * @Route("/PetiteEnfance", name="PetiteEnfance")
     */
    public function PetiteEnfance(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/PetiteEnfance.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
    /**
     * @Route("/EcolePrimaire", name="EcolePrimaire")
     */
    public function EcolePrimaire(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/EcolePrimaire.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
    /**
     * @Route("/CollegeEtLycee", name="CollegeEtLycee")
     */
    public function CollegeEtLycee(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/CollegeEtLycee.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
    /**
     * @Route("/Cantine", name="Cantine")
     */
    public function Cantine(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/Cantine.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
    /**
     * @Route("/CaisseDesEcoles", name="CaisseDesEcoles")
     */
    public function CaisseDesEcoles(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/CaisseDesEcoles.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
    /**
     * @Route("/CentreLoisirs", name="CentreLoisirs")
     */
    public function CentreLoisirs(): Response
    {
        return $this->render('enfance_jeunesse_scolarite/CentreLoisirs.html.twig', [
            'controller_name' => 'EnfanceJeunesseScolariteController',
        ]);
    }
}
