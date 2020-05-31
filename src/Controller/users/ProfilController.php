<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

    /**
     * @Route("/profile")
     */
class ProfilController extends BaseController
{
  
     /**
     * @Route("/", name="profile.index", methods={"GET"})
     */
    public function index() :Response
    {
        return $this->render("users/base.html.twig");      
    }

    /**
     * @Route("/show", name="profile.show", methods={"POST"})
     */
    public function dataUser(Request $request){

        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $url = 'https://webradio-stream.herokuapp.com/authorized/users/logged';
 
            $response = Unirest\Request::get($url,$headers);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        }
    }

    /**
     * @Route("/setting", name="setting.index", methods={"GET"})
     */
    public function setting() :Response
    {
        return $this->render("users/settings/base.html.twig"); 
    }

    /**
     * @Route("/setting/show", name="setting.show", methods={"POST"})
     */
    public function getData(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            
            $params = json_decode($content, true);
            dump($params);
            $token = $params['tokenUser'];
            $userId = $params['userId'];
            $username = $params['username'];
            $avatar = $params['avatar'];

          

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            $query = array('avatar' => $avatar,'username' => $username);

            /*$url = "https://webradio-stream.herokuapp.com/authorized/users/$userId";
            $body = Unirest\Request\Body::form($query);

            $response = Unirest\Request::put($url,$headers,$body);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; */
          return new Response(json_encode($query), 201);
            
        }
    }

    /**
     * @Route("/mypassword", name="mypassword.index", methods={"POST"})
     */
    public function myPassword(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];
            $userId = $params[''];
            $password = $params['password'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $query = array('password' => $password);
            $body = Unirest\Request\Body::form($query);

            $url = "https://webradio-stream.herokuapp.com/authorized/users/password/$userId";
 
            $response = Unirest\Request::put($url,$headers,$body);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        }
    }

    /**
     * @Route("/myChannel", name="myChannel.index", methods={"POST"})
     */
    public function myChannel(Request $request) :Response
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];
            $channelId = $params[''];
            $name = $params['name'];
            $avatar = $params['downloadURLChannel'];


            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $query = array('avatar' => $avatar, 'name' =>$name);
            $body = Unirest\Request\Body::form($query);

            $url = "https://webradio-stream.herokuapp.com/authorized/channels/update/$channelId";
 
            $response = Unirest\Request::put($url,$headers,$body);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        } 
    }

    

    
}