<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

/**
* @Route("/superadmin/users")
*/
class UserSuperController extends BaseController
{
    /**
    * @Route("/", name="superadmin.users.index",)
    */
    public function index()
    {

    }

    /**
    * @Route("/new", name="superadmin.users.new", methods={"GET","POST"})
    */
    public function new(Request $request)
    {

    }

    /**
     * @Route("/{id}/edit", name="superadmin.users.edit", methods={"GET","POST"})
     */
    public function edit(Request $request)
    {

    }

    /**
    * @Route("/{id}", name="superadmin.user.bannir", methods={"GET","POST"})
    */
    public function bannir()
    {

    }

    

}
