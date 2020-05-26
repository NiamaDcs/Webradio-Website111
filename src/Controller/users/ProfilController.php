<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

    /**
     * @Route("/profile")
     */
class ProfilController extends BaseController
{
     /**
     * @Route("/", name="profile.index")
     */
    public function index()
    {
        $this->render("users/base.html.twig");
    }
}