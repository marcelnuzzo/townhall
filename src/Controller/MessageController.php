<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\TownHallRepository;
use App\Entity\TownHall;
use App\Form\ContactType;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\envoiMail;

class MessageController extends AbstractController
{
    
	/**
     * @Route("/user/message/index", name="message_index")
     */
    public function message_index()
    {
		$messages = $this->getDoctrine()->getRepository(Message::class)->findBy(array(), array('receivedAt' => 'DESC'));
        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * @Route("/nous-contacter", name="message_send", methods={"GET","POST"})
     */
    public function messag_send(Request $request, \Swift_Mailer $mailer,  EnvoiMail $envoiMail, TownHallRepository $repo): Response
    {
        $message = new Message();
        $firstId = $repo->findFirstId()[0]['id'];
        $townhall = $this->getDoctrine()->getRepository(TownHall::class)->find($firstId);
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
			$message->setStatus("unread");
			$message->setReceivedAt(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
            $entityManager->persist($message);
            $entityManager->flush();
            // Send message
            $mes = $envoiMail->envoi($message);
            $mailer->send($mes);
            $this->addFlash('success', 'Le message a été envoyé.');

            return $this->redirectToRoute('home_index');
        }

        return $this->render('message/send.html.twig', [
            'message' => $message,
			'townhall' => $townhall,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/message/show/{id}", name="message_show", methods={"GET"})
     */
    public function message_show(Message $message): Response
    {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }
	
	    /**
     * @Route("/user/message/status/{id}", name="message_status")
     */
    public function message_status(Request $request, Message $message): response
	{
		if ($message->getStatus() == "Non lu")
			$message->setStatus("Lu");
		else
			$message->setStatus("Non lu");
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($message);
			$entityManager->flush();
        return $this->redirectToRoute('message_show', ['id' => $message->getId()]);
    }
	
	

    /**
     * @Route("/user/message/delete/{id}", name="message_delete", methods={"DELETE"})
     */
    public function message_delete(Request $request, Message $message): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('message_index');
    }
}
