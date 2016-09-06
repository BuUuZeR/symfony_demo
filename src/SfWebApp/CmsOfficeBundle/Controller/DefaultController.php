<?php

namespace SfWebApp\CmsOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfWebAppCmsOfficeBundle:Default:index.html.twig');
    }
}
