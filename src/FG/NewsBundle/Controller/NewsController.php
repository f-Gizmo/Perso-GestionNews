<?php

namespace FG\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FG\NewsBundle\Entity\Newsletter;
use FG\NewsBundle\Form\NewsletterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class NewsController extends Controller
{
	/**
	*@security ("has_role('ROLE_AUTEUR')")
	*/
	public function indexAction()
	{		
		return $this->render('FGNewsBundle:News:index.html.twig');

	}

	public function viewAction($id)
	{
		return $this->render('FGNewsBundle:News:index.html.twig', array(
			'content' => 'view',
			'id' =>$id,
			'title' => 'News numéro '.$id
			));

		
	}
	/**
	* @security("has_role('ROLE_ADMIN')")
	*/
	public function addAction (Request $request)
	{
		$news = new Newsletter;
		$form= $this->createForm(NewsletterType::class, $news);

		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($news);
				$em->flush();

				$request->getSession()->getFlashBag()->add('info', 'Ajout de l\'enregistrement Newsletter');
				return $this->redirectToRoute('fg_news_homepage');
			}
		}

		return $this->render('FGNewsBundle:News:add_news.html.twig'  ,array(
			'form' => $form->createView()
			));
		
	}
}