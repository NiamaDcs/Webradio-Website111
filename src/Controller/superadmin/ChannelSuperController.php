<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

/**
 * @Route("/superadmin/channel")
 */
class ChannelSuperController extends BaseController {

     /**
    * @Route("/", name="superadmin.channel.index",  methods={"GET"})
    */
    public function index(Request $request) 
    {
        return $this->render('superadmin/channel/base.html.twig');
    }

    /**
    * @Route("/show", name="superadmin.channel.show",  methods={"POST"})
    */
    public function getAllChannel()
    {

    }

    /*
     * @Route("/{id}/edit", name="superadmin.channel.edit", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {

    }

    /*
    * @Route("/{id}", name="superadmin.channel.bannir", methods={"GET","POST"})
    */
    public function bannir(Request $request)
    {

    }
}






