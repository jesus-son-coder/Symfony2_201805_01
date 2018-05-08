<?php

namespace TechCorp\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository
{
    public function getStatusesAndUsers()
    {
        return $this->_em->createQuery("
                select s, u 
                from TechCorpFrontBundle:Status s
                join s.user u 
                ORDER BY 
                  s.createdAt DESC,
                  s.id DESC 
              ")
            ;
    }

    public function getUserTimeline($user)
    {
        return $this->_em->createQuery("
            SELECT s, c, u
            FROM TechCorpFrontBundle:Status s
            LEFT JOIN s.comments c
            LEFT JOIN c.user u
            WHERE
                s.user = :user
                AND s.deleted = false
            ORDER BY
                s.createdAt DESC 
        ")
         ->setParameter('user', $user) ;
    }
}