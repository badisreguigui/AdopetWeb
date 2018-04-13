<?php

namespace AdoptBundle\Repository;

/**
 * testRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */


class testRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByPostId($postId){
        $query = $this->getEntityManager()
            ->createQuery("select b from AdoptBundle:Comments b WHERE b.postId=:postId")
            ->setParameter('postId', $postId);
        return $query->getResult();
    }

    public function findInsultes($comment){
        $query = $this->getEntityManager()
            ->createQuery("select i from AdoptBundle:insult i WHERE i.insult=:comment")
            ->setParameter('comment', $comment);
        return $query->getResult();
    }
}
