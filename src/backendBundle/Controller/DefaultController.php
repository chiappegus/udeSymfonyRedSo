<?php

namespace backendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	$em= $this->getDoctrine()->getManager();
    	$user_repo =$em->getRepository('backendBundle:User');

    	$user = $user_repo->find(1);
    	//$user = $user_repo->findAll();

    
    	//var_dump($user);
    	echo "Bienvenido ".$user->getName()." ".$user->getSurname();
    	die();

        return $this->render('backendBundle:Default:index.html.twig');
    }
}
