<?php
/**
 * Created by PhpStorm.
 * User: Seka Herve
 * Date: 27/04/2018
 * Time: 02:08
 */

namespace TechCorp\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StaticController extends Controller
{
    public function homepageAction()
    {
        $name = 'World';
        $article = 'Produit 1';
        return $this->render('TechCorpFrontBundle:Static:homepage.html.twig',
            array('article' => $article));
    }

    public function aboutAction()
    {
        return $this->render('TechCorpFrontBundle:Static:about.html.twig');
    }

}