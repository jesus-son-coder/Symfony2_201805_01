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

        $repository = $em->getRepository('TechCorpFrontBundle:Status');
        $statuses = $repository->getStatusesAndUsers()->getResult();

        return $this->render('TechCorpFrontBundle:Timeline:timeline.html.twig', array(
            'statuses' => $statuses,
        ));
    }

    public function userTimelineAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('TechCorpFrontBundle:User')->findOneById($userId);
        if(!$user) {
            $this->createNotFoundException("L'utilisateur n'a pas été trouvé.");
        }
        $statuses = $em->getRepository('TechCorpFrontBundle:Status')->getUserTimeline($user)->getResult();

        return $this->render('TechCorpFrontBundle:Timeline:user_timeline.html.twig', array(
            'user' => $user,
            'statuses' => $statuses,
        ));
    }


}