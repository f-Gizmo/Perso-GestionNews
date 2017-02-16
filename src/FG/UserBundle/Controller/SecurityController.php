<?php

namespace FG\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEBERED')) {
        	return $this->redirectToRoute('fg_master_homepage');
        }

        $authenticationUtils = $this->get('security.authentication_utils');
        return $this->render('FGUserBundle:Security:login.html.twig', array(
        	'last_username' => $authenticationUtils->getLastUsername(),
        	'error' => $authenticationUtils->getLastAuthenticationError(),
        	));
    }
}
