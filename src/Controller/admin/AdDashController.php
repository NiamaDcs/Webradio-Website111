<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

    /**
     * @Route("/admin")
     */
class AdDashController extends BaseController
{

    /**
     * @Route("/", name="admin.index", methods={"GET"})
     */
    public function index() 
    {
        return $this->render('admin/base.html.twig');
    }

    /**
     * @Route("/stats", name="admin.stats.show", methods={"POST"})
     */
    public function getStatistics(Request $request)
    {

    }

    /**
     * @Route("/setting/{id}", name="admin.setting.index")
     */
    public function settings(Request $request)
    {

    }
  
    /**
     * @Route("/setting/password/{id}", name="admin.passwordChange")
     */
    public function passwordChange(Request $request)
    {

    }

}