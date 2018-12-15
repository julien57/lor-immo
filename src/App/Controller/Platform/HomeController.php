<?php

namespace App\Controller\Platform;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_index")
     */
    public function indexAction()
    {
        return $this->render('platform/index.html.twig');
    }
}