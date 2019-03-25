<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\getDoctrine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use backendBundle\Entity\User;




class UserController extends Controller
{
    


    public function __construct(){
        $status='hola';
        
       // $this->session =  Session();
        

    }

   
    
    // public function loginAction(AuthenticationUtils $authenticationUtils)
     public function loginAction(/*Request $request*/)
    {


            if(is_object($this->getUser())){
              return  $this->redirect('home');
            }
        /* echo "accion login";*/
            //die();
            //
        
            //
         $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();


     	return $this->render('AppBundle:User:login.html.twig',
     		array('last_username' => $lastUsername,
        'error'         => $error,));
    }

    public function registerAction(Request $request)
    {
        if(is_object($this->getUser())){
              return  $this->redirect('home');
            }

            
        $user = new User();
        $form= $this-> createForm(RegisterType::class,$user);

        /*recoger la request*/
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

        	if($form->isValid()){

        		$em= $this->getDoctrine()->getManager();
        		/* aca se carga la entidad User y se pueden hacer todas
        		las consultas */
        		//$user_repo=$em->getRepository("backendBundle:User");
        		//
        		//saber que el user no se encuentre registrado
        		
        		$query=$em->createQuery(' Select u From backendBundle:User u where u.email = :email or u.nick = :nick ')
        		    ->setParameter('email',$form->get('email')->getData())
        		    ->setParameter('nick',$form->get('nick')->getData())
        		    ;

        		// para sacar el resultado de la query se hace :
        		$user_isset =$query->getResult();

        		if (count($user_isset)==0) {

        			//$user = new User();

        			//se crea en la base 
        			//
        			//se encoder la pass
        			$factory=$this->get("security.encoder_factory");
        			$encoder= $factory->getEncoder($user);


        			$password=$encoder->encodePassword($form->get('password')->getData(),$user->getSalt());


        			$user->setPassword($password);
        			$user->setRole('ROLE_USER');
        			$user->setImage(null);
                    // persistimos en el MAnager 
        			$em->persist($user);

                    // y aca agregamos la informacion :) al manager

        			$flush=$em->flush();

        			if ($flush==null) {
        				$status='Te has registrado correctamente';
                         $this->addFlash('status','Te has registrado correctamente');

        				return $this->redirect("login");
        			}

        			else{

        				$status='No te  has registrado correctamente';
        			}

        			
        		} else{
        			$status ='El usuario ya existe';
                    $this->addFlash('status','El usuario ya existe');
        		}


        	}
        	else
        	{
        		$status='No te has registrado Correstamente';
                 $this->addFlash('status','El usuario ya existe');
        	}

        	/*var_dump($status);
        	die();*/

           
        }

     	return $this->render('AppBundle:User:rEgister.html.twig',
     		array("form"=>$form->createView() 
     			));
    }


    public function nickTestAction(Request $request)
    {
        $nick =$request->get("nick");//viaja por post!! gracias al requestr


        $em =$this->getDoctrine()->getManager();

        $user_repo=$em->getRepository("backendBundle:User");

        $user_isset=$user_repo->findOneBy(array("nick"=>$nick));

        $result = "used";

        if ( is_object($user_isset)) { //if ( count($user_isset)>=1 && is_object($user_isset)) 
            
             $result = "used";
        } else{
            $result = "unused";
        }

        return new Response($result);

        



    }
}
