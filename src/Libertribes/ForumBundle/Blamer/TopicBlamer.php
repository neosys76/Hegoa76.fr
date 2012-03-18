<?php

namespace Libertribes\ForumBundle\Blamer;

use Libertribes\ForumBundle\Entity\Topic

class TopicBlamer extends AbstractSecurityBlamer
{
    public function blame(Topic $topic)
    {
        $topic->setAuthor($this->security->getToken()->getUser());
    }
}
