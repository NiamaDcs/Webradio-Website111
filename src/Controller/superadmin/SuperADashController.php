<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

    /**
     * @Route("/superadmin")
     */
class SuperADashController extends BaseController
{

    /**
     * @Route("/", name="superadmin.index", methods={"GET"})
     */
    public function index() 
    {
        return $this->render('superadmin/base.html.twig');
    }

    /**
     * @Route("/stats", name="superadmin.stats.show", methods={"POST"})
     */
    public function getStatistics(Request $request)
    {

    }

    /**
     * @Route("/setting", name="superadmin.setting.index")
     */
    public function settings(Request $request)
    {
        return $this->render("superadmin/settings/base.html.twig"); 
    }

    /**
     * @Route("/setting/show", name="superadmin.setting.show", methods={"POST"})
     */
    public function getData(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            
            $params = json_decode($content, true);
            
            $token      = $params['tokenUser'];
            $userId     = $params['idUser'];
            $username   = $params['username'];
            $avatar     = $params['avatar'];
            $email      = $params['email'];

          

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            $query = array('avatar' => $avatar,'username' => $username, 'email' => $email);

            $url = "https://webradio-stream.herokuapp.com/authorized/users/$userId";
            $body = Unirest\Request\Body::form($query);

            $response = Unirest\Request::put($url,$headers,$body);
 
            $result = $response->raw_body; 
            return new Response($result, 201);
            
        }
    }

  
    /**
     * @Route("/setting/password", name="superadmin.passwordChange")
     */
    public function passwordChange(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];
            $userId = $params['idUser'];
            $password = $params['password'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $query = array('password' => $password);
            $body = Unirest\Request\Body::form($query);

            $url = "https://webradio-stream.herokuapp.com/authorized/users/password/$userId";
 
            $response = Unirest\Request::put($url,$headers,$body);
     
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        }
    }



}