<?php
/**
 * Created by PhpStorm.
 * User: Seka Herve
 * Date: 13/05/2018
 * Time: 10:52
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

class ArticleController extends Controller
{
    public function newAction()
    {
        $article = new Article();
        $form = $this->createFormBuilder($article)
            ->add('title', 'text')
            ->add('content', 'text')
            ->add('publicationDate', 'date')
            ->add('save', 'submit')
            ->getForm();

        return $this->render(
            'AppBundle:Article:new.html.twig', array(
                'form' => $form->createView(),
            )
        );
    }

    public function createAction()
    {
        $entity = new Article();
        $request = $this->getRequest();
        $form = $this->createForm(new ArticleType(), $entity);
        $form->bind($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('app_article_homepage'));
            // return $this->redirect($this->generateUrl('article_show', array('id' => $entity->getId() )));
        };

        return $this->render('AppBundle:Article:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            ));
    }


    public function homepageAction()
    {
        return $this->render(
            'AppBundle:Article:homepage.html.twig'
        );
    }

    public function showAction()
    {
        return $this->render('AppBundle:Article:homepage.html.twig');
    }
}