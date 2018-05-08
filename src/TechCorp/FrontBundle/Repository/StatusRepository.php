<?php

namespace TechCorp\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository
{
    public function getStatusesAndUsers()
    {
        return $this->_em->createQueryBuilder()
            ->select('s', 'u')
            ->from('TechCorpFrontBundle:Status', 's')
            ->join("s.user", 'u')
            ->orderBy('s.createdAt', 'DESC')
            ->getQuery()
            ;
    }

}