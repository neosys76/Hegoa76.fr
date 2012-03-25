<?php

namespace Libertribes\ForumBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class PostRepository extends ObjectRepository 
{

    public function findOneById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }


    public function findAllByTopic($topicid, $asPaginator = false)
    {
        $qb = $this->createQueryBuilder('post')
            ->orderBy('post.createdAt')
            ->where('post.topicid = :topic')
            ->setParameter('topic', $topicid);

        if ($asPaginator) {
            return new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        }

        return $qb->getQuery()->execute();
    }


    public function findRecentByTopic($topicid, $number)
    {
        return $this->createQueryBuilder('post')
            ->orderBy('post.createdAt', 'DESC')
            ->where('post.topicid = :topic')
            ->setMaxResults($number)
            ->setParameter('topic', $topicid)
            ->getQuery()
            ->execute();
    }


    public function search($query, $asPaginator = false)
    {
        $qb = $this->createQueryBuilder('post');
        $qb
            ->where($qb->expr()->like('post.message', $qb->expr()->literal('%' . $query . '%')))
            ->orderBy('post.createdAt')
        ;

        if ($asPaginator) {
            return new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        }

        return $qb->getQuery()->execute();
    }

    /**
     * Gets the post that preceds this one
     *
     * @return Post or null
     **/
    public function getPostBefore($post)
    {
        $candidate = null;
        foreach ($this->findAllByTopic($post->getTopic()) as $p) {
            if ($p !== $post) {
                if ($p->getNumber() > $post->getNumber()) {
                    break;
                }
                $candidate = $p;
            }
        }

        return $candidate;
    }


    public function createNewPost()
    {
        $class = $this->getObjectClass();

        return new $class();
    }
	
    public function findAuthor($id)
    {
        $post= $this->createQueryBuilder('post')
            ->where('post.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
		return $post->getAuthor();
    }
}
