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
    * @Route("/edit", name="admin.channel.edit")
    */
    public function edit()
    {
        return $this->render('admin/channel/editChannel/editChannel.html.twig');

    }

   
}