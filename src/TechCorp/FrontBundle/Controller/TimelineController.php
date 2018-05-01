<?php
/**
 * Created by PhpStorm.
 * User: Seka Herve
 * Date: 01/05/2018
 * Time: 04:38
 */

namespace TechCorp\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TechCorp\FrontBundle\Entity\Status;

class TimelineController extends Controller
{
    public function timelineAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statuses = $em->getRepository('TechCorpFrontBundle:Statuts')->findAll();

        return $this->render('TechCorpFrontBundle:Timeline:timeline.html.twig', array(
            'statuses' => $statuses,
        ));
    }
}