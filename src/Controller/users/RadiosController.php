<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

    /**
     * @Route("/radios")
     */
class RadiosController extends BaseController {

     /**
     * @Route("/", name="radios.index", methods={"GET"})
     */
    public function index()
    {
        return $this->render("users/radios/base.html.twig"); 
    }

    /**
     * @Route("/show", name="radios.show", methods={"POST"})
     */
    public function getRadios(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];

            $headers = array('Accept' => 'application/json');
            
            $url = 'https://webradio-stream.herokuapp.com/auth/radios/all';
 
            $response = Unirest\Request::get($url,$headers);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        }
    }
}