<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Unirest;

class SecurityController extends AbstractController
{
    
    /**
     * @Route("/login", name="app.login", methods={"POST"})
     */
    public function login(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);


            $email = $params['email'];
            $password = $params['password'];

            $headers = array('Accept' => 'application/json');
            $query = array('email' => $email, 'password' => $password);
            
            $url = 'https://webradio-stream.herokuapp.com/auth/login';
            $body = Unirest\Request\Body::form($query);
 
            $response = Unirest\Request::post($url,$headers,$body);
 
           $result = $response->raw_body;

            return new Response($result, 201);
            //return new Response(json_encode($query), 201);
            
        }
        
        return $this->render('page/home.html.twig');
        
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
