<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class animeListRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT * FROM AppBundle:animeList p ORDER BY p.title ASC')
            ->getResult();
    }
}