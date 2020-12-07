<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/Contact", name="Contact")
     */
    public function Contact(): Response
    {
        return $this->render('contact/Contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
