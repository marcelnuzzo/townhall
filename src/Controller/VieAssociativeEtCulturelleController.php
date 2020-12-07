<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VieAssociativeEtCulturelleController extends AbstractController
{
    /**
     * @Route("/AnnuaireDesAssociations", name="AnnuaireDesAssociations")
     */
    public function AnnuaireDesAssociations(): Response
    {
        return $this->render('vie_associative_et_culturelle/AnnuaireDesAssociations.html.twig', [
            'controller_name' => 'VieAssociativeEtCulturelleController',
        ]);
    }
     /**
     * @Route("/LocationDeSalle", name="LocationDeSalle")
     */
    public function LocationDeSalle(): Response
    {
        return $this->render('vie_associative_et_culturelle/LocationDeSalle.html.twig', [
            'controller_name' => 'VieAssociativeEtCulturelleController',
        ]);
    }
     /**
     * @Route("/EspaceCulturelle", name="EspaceCulturelle")
     */
    public function EspaceCulturelle(): Response
    {
        return $this->render('vie_associative_et_culturelle/EspaceCulturelle.html.twig', [
            'controller_name' => 'VieAssociativeEtCulturelleController',
        ]);
    }
}
