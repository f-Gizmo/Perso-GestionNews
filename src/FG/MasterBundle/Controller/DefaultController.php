<?php

namespace FG\MasterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FGMasterBundle:Default:index.html.twig');
    }
}
