<?php

namespace FG\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{

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
	public function addAction ()
	{
		return $this->render('FGNewsBundle:News:index.html.twig', array('content' => 'Add',
			'id'=>2,
			'title' =>'Ajout de news'
			));
		
	}
}