<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

/**
* @Route("/admin/users")
*/
class UsersAdController extends BaseController
{
    /**
    * @Route("/", name="admin.users.index",)
    */
    public function index()
    {
        return $this->render('admin/user/index.html.twig');
    }

    /**
    * @Route("/show", name="admin.users.show", methods={"POST"})
    */
    public function allUser(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);

            $token = $params['token'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            
            $url = "https://webradio-stream.herokuapp.com/authorized/users";
 
            $response = Unirest\Request::get($url,$headers);
 
            
            $result = $response->raw_body; 
            return new Response($result, 201);
            
        }
    }

    /**
    * @Route("/new", name="admin.users.new", methods={"GET","POST"})
    */
    public function new(Request $request)
    {
        return $this->render('admin/user/new/new.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="admin.users.edit", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {
        $content = $request->getContent();
        dump($content);
        
        return $this->render('admin/user/edit/edit.html.twig');
    }

    public function getOneUser(Request $request) 
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];
            $idUser = $params['user_id'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $url = "https://webradio-stream.herokuapp.com/authorized/users/$idUser";
 
            $response = Unirest\Request::get($url,$headers);
 
       
            $result = $response->raw_body; 
            return new Response($result, 201);
            
        }
    }

    /**
     * 
     *@Route("/new", name="admin.users.new", methods={"GET", "POST"})
     * @param Request $request
     * @return void
     */
    public function createUser(Request $request)
    {
        if($request->isMethod("POST")){

            $content = $request->getContent();

            $params = json_decode($content, true);


            $email = $params['email'];
            $username = $params['username'];
            $token = $params['token'];
            $avatar = $params['avatar'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            $query = array('email' => $email, 'username' => $username, 'avatar' =>$avatar);
            
            $url = 'https://webradio-stream.herokuapp.com/authorized/users/create';
            $body = Unirest\Request\Body::form($query);
 
            $response = Unirest\Request::post($url,$headers,$body);
 
           $result = $response->raw_body;

            return new Response($result, 201);
            //return new Response(json_encode($query), 201);
        }

        return $this->render("admin/user/new/new.html.twig");
    }

    

}