<?php
	
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
	public function indexAction($page)
	{
		$listAdverts = array(
			array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => 1,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Mission de webmaster',
				'id'      => 2,
				'author'  => 'Hugo',
				'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
				'date'    => new \Datetime()),
			array(
				'title'   => 'Offre de stage webdesigner',
				'id'      => 3,
				'author'  => 'Mathieu',
				'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
				'date'    => new \Datetime())
		);


		if($page < 1)
		{
			throw new NotFoundHttpException('Page '.$page.' inexistante');
		} 

		return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
			'listAdverts' => array()
		));
	}

	public function viewAction($id)
	{
		$advert = array(
			'title'   => 'Recherche développpeur Symfony2',
			'id'      => $id,
			'author'  => 'Alexandre',
			'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
			'date'    => new \Datetime()
	    );

	    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
			'advert' => $advert
	    ));
   	}

	public function addAction(Request $request)
	{
		if($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistré');

			return $this->redirectToRoute('oc_platform_view', array('id' => 5));
		}

		return $this->render('OCPlatformBundle:Advert:add.html.twig');
	}

	public function editAction($id, Request $request)
	{
		if($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifié');
		}

		$advert = array(
			'title'   => 'Recherche développpeur Symfony',
			'id'      => $id,
			'author'  => 'Alexandre',
			'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
			'date'    => new \Datetime()
		);

		return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
			'advert' => $advert
	    ));
	}

	public function deleteAction($id)
	{
		return $this->render('OCPlatformBundle:Advert:delete.html.twig');
	}

	public function menuAction($limit)
	{
		$listAdverts = array(
			array('id' => 2, 'title' => 'Recherche développeur Symfony'),
			array('id' => 5, 'title' => 'Mission de webmaster'),
			array('id' => 9, 'title' => 'Offre de stage webdesigner')
		);

		return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
			'listAdverts' => $listAdverts
		));
	}

}