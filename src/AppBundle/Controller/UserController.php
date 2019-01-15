<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use backendBundle\Entity\User;

class UserController extends Controller
{
    
    public function loginAction(Request $request)
    {
        /* echo "accion login";*/
            //die();

     	return $this->render('AppBundle:User:login.html.twig',
     		array("titulo"=>"Login" ));
    }

    public function registerAction(Request $request)
    {
        $User = new User();
        $form= $this-> createForm(RegisterType::class,$User);

     	return $this->render('AppBundle:User:rEgister.html.twig',
     		array("form"=>$form->createView() 
     			));
    }
}
