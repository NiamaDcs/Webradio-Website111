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

    }

    /**
    * @Route("/new", name="admin.users.new", methods={"GET","POST"})
    */
    public function new(Request $request)
    {

    }

    /**
     * @Route("/{id}/edit", name="admin.users.edit", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {

    }

    /**
    * @Route("/{id}", name="admin.user.bannir", methods={"GET","POST"})
    */
    public function bannir()
    {

    }

}