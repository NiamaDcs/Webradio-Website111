<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/banni")
 */
class BannishController extends BaseController {

    /**
    * @Route("/", name="banni.index", methods={"GET"})
    */
    public function index() :Response
    {
        return $this->render("banni/base.html.twig");    
    }

     /**
    * @Route("/setting", name="banni.setting", methods={"GET"})
    */
    public function setting() :Response
    {
        return $this->render("banni/settings/base.html.twig"); 
    }

     /**
    * @Route("/page", name="banni.page", methods={"GET"})
    */
    public function pageBanni() :Response
    {
        return $this->render("banni/pageBanni/pagebanni.html.twig"); 
    }

     /**
    * @Route("/radios", name="banni.radios", methods={"GET"})
    */
    public function pageRadio() :Response
    {
        return $this->render("banni/radios/radios.html.twig"); 
    }



}