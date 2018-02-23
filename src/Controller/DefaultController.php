<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function index()
    {
        $number = mt_rand(0, 100);

        return $this->render('home.html.twig', array(
            'number' => $number,
        ));
    }
}