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
    public function getAllChannel()
    {

    }

    /*
     * @Route("/{id}/edit", name="admin.channel.edit", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {

    }

    /*
    * @Route("/{id}", name="admin.channel.bannir", methods={"GET","POST"})
    */
    public function bannir(Request $request)
    {

    }
}