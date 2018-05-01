<?php

namespace TechCorp\FrontBundle\Controller;

use AppBundle\Entity\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Article;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TechCorpFrontBundle:Default:index.html.twig', array('name' => $name));

    }

}
