<?php

namespace Libertribes\ForumBundle\Entity;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class TopicRepository extends ObjectRepository 
{
    /**
     * Finds one topic by its categoryId and its slug
     *
     * @param integer $category
     * @param string $slug
     * @return Topic or NULL
     **/
    public function findOneByCategoryAndSlug($categoryid, $slug)
    {
        return $this->findOneBy(array(
            'slug'      => $slug,
            'category'  => $categoryid
        ));
    }

    /**
     * Finds one topic by its id
     *
     * @param integer $id
     * @return Topic or NULL whether the specified id does not match any topic
     */
    public function findOneById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

    /**
     * Finds all topics ordered by their last pull date
     *
     * @param boolean $asPaginator Will return a Paginator instance if true
     * @return array|Paginator
     */
    public function findAll($asPaginator = false)
    {
        $query = $this->createQueryBuilder('topic')
                        ->orderBy('topic.isPinned', 'DESC')
                        ->addOrderBy('topic.pulledAt', 'DESC')
                        ->getQuery();

        if ($asPaginator) {
            return new Pagerfanta(new DoctrineORMAdapter($query));
        } else {
            return $query->execute();
        }
    }

    /**
     * Finds all topics matching to the specified Category ordered by their
     * last pull date
     *
     * @param integer $categoryid
     * @param boolean $asPaginator Will return a Paginator instance if true
     * @return array|Paginator
     */
    public function findAllByCategory($categoryid, $asPaginator = false)
    {
        $qb = $this->createQueryBuilder('topic');
        $qb->orderBy('topic.isPinned', 'DESC')
            ->addOrderBy('topic.pulledAt', 'DESC')
            ->where($qb->expr()->eq('topic.categoryid', $categoryid));

        if ($asPaginator) {
            return new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        } else {
            return $qb->getQuery()->execute();
        }
    }

    /**
     * Get topics which have the more recent last post
     *
     * @param int $number
     * @return array of Topics
     */
    public function findLatestPosted($number)
    {
        return $this->createQueryBuilder('topic')
            ->orderBy('topic.pulledAt', 'DESC')
            ->setMaxResults($number)
            ->getQuery()
            ->execute();
    }

    /**
     * Finds all topics matching the specified query ordered by their
     * last pulled date
     *
     * @param string $query
     * @param boolean $asPaginator Will return a Paginator instance if true
     * @return array|Paginator
     */
    public function search($query, $asPaginator = false)
    {
        $qb = $this->createQueryBuilder('topic');
        $qb->orderBy('topic.pulledAt DESC')->where($db->expr()->like('topic.subject', '%' . $query . '%'));

        if ($asPaginator) {
            return new Pagerfanta(new DoctrineORMAdapter($qb->getQuery()));
        }

        return $qb->getQuery->execute();
    }

    /**
     * Increment the number of views of a topic
     *
     * @param Topic $topic
     * @return void
     */
    public function incrementTopicNumViews($topic)
    {
        $this->createQueryBuilder('topic')
            ->update()
            ->set('topic.numViews', 'topic.numViews + 1')
            ->where('topic.id = :topic_id')
            ->setParameter('topic_id', $topic->getId())
            ->getQuery()
            ->execute();
    }

    /**
     * Creates a new post instance
     *
     * @return Topic
     */
    public function createNewTopic()
    {
        $class = $this->getObjectClass();

        return new $class();
    }
	
    public function findAuthor($id)
    {
        $post= $this->createQueryBuilder('topic')
            ->where('topic.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
		return $post->getAuthor();
    }
}
