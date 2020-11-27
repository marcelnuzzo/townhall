<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/index", name="user_index")
     */
    public function user_index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findBy(array(), array('createdat' => 'DESC'));
		return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/admin/user/new", name="user_new", methods={"GET","POST"})
     */
    public function user_new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user->setRoles(["ROLE_ADMIN"]);
			$password = $passwordEncoder->encodePassword($user, "kevin"); //Encode the password
            $user->setPassword($password); //setter the password of user
            $user->setCreatedat(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
			$this->addFlash('success', 'Le compte utilisateur a été créé avec succès');

            //return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/show/{id}", name="user_show")
     */
    public function user_show(User $user)
    {
		return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/admin/user/edit/{id}", name="user_edit", methods={"GET","POST"})
     */
    public function user_edit(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
			$password = $passwordEncoder->encodePassword($user, "kevin"); //Encode the password
            $user->setPassword($password); //setter the password of user
			$this->addFlash('success', 'Les modifications ont bien été enregistrées.');
            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/user/delete/{id}", name="user_delete", methods={"DELETE"})
     */
    public function user_delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
