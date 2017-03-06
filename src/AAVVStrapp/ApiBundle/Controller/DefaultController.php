<?php

namespace AAVVStrapp\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AAVVStrappApiBundle:Default:index.html.twig');
    }
}
