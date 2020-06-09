<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

/**
 * @Route("/admin/channel")
 */
class ChannelAdController extends BaseController {

    /**
    * @Route("/", name="admin.channel.index",  methods={"GET"})
    */
    public function index(Request $request) 
    {
        return $this->render('admin/channel/base.html.twig');
    }

    /**
    * @Route("/show", name="admin.channel.show",  methods={"POST"})
    */
    public function getAllChannel(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);

            $token = $params['token'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            
            $url = "https://webradio-stream.herokuapp.com/authorized/channels/all";
 
            $response = Unirest\Request::get($url,$headers);
 
            
            $result = $response->raw_body; 
            return new Response($result, 201);
            
        }
    }

    /**
    * @Route("/edit/{id}", name="admin.channel.edit", methods={"GET", "POST"})
    */
    public function edit(Request $request) 
    {
        
        return $this->render('admin/channel/editChannel/editChannel.html.twig');
    }

    /**
    * @Route("/edit/show", name="admin.edit.show", methods={"POST"})
    */
    public function getOneChannel(Request $request)
    {
        if($request->isMethod("POST")){
            $content = $request->getContent();

            $params = json_decode($content, true);

            $token = $params['token'];
            $channelId = $params['idChannel'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            
            /*$url = "https://webradio-stream.herokuapp.com/authorized/channels/update/$channelId";
 
            $response = Unirest\Request::get($url,$headers);
 
            
            $result = $response->raw_body; 
            return new Response($result, 201);*/

            return new Response("ok");
        }
    }

     /**
    * @Route("/edit/update", name="admin.channel.update", methods={"POST"})
    */
    public function updateChannel(Request $request)
    {
        if($request->isMethod("POST")){

            $content = $request->getContent();

            $params = json_decode($content, true);
            
            $channelName = $params['channelName'];
            $token = $params['token'];
            $avatar = $params['avatar'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            $query = array('channelName' => $channelName, 'avatar' =>$avatar);
            
            /*$url = "https://webradio-stream.herokuapp.com/authorized/channels/update/$channelId";
            $body = Unirest\Request\Body::form($query);
 
            $response = Unirest\Request::put($url,$headers,$body);
 
           $result = $response->raw_body;

            return new Response($result, 201);*/
            return new Response(json_encode($query), 201);
        }

    }

   
}