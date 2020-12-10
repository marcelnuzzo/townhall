<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/user/article/index", name="article_index")
	 * @Route("/articles", name="article_indexpublic")
	 * @param $_route
     */
    public function article_index($_route)
    {
		$articles = $this->getDoctrine()->getRepository(Article::class)->findBy(array(), array('publishedat' => 'DESC'));    
		$render = $_route=="article_index" ? 'article/index.html.twig' : 'article/indexpublic.html.twig';
		return $this->render($render, [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/user/article/new", name="article_new", methods={"GET","POST"})
     */
    public function article_new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        $user =  $this->getUser();
    
        if ($form->isSubmitted() && $form->isValid()) {
			$article->setPublishedat(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
            $article->setUser($user);
            $entityManager = $this->getDoctrine()->getManager();
           
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/article/show/{id}", name="article_show", methods={"GET"})
	 * @Route("/article/{id}", name="article_showpublic", methods={"GET"})
	 * @param $_route
     */
    public function article_show($_route, Article $article): Response
    {
        $render = $_route=="article_show" ? 'article/show.html.twig' : 'article/showpublic.html.twig';
		return $this->render($render, [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/user/article/edit/{id}", name="article_edit", methods={"GET","POST"})
     */
    public function article_edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/article/delete/{id}", name="article_delete")
     */
    public function article_delete($id, Request $request, EntityManagerInterface $manager)
    {
        $article = $manager->getRepository(Article::class)->find($id);
		$article->setImageName("");
        $manager->remove($article);
        $manager->flush();
        return $this->redirectToRoute('article_index');
    }
}
