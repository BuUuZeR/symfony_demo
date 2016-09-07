<?php
	
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
	public function indexAction()
	{
		$content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Ivan'));

		return new Response($content);
	}

	public function viewAction($id)
	{
		return new Response('Parametre passé par url '.$id);
	}

	public function viewSlugAction($slug,$year,$format)
	{
		return new Response('Slug : '.$slug.'<br>L\'année '.$year.'<br>Format : '.$format);
	}
}