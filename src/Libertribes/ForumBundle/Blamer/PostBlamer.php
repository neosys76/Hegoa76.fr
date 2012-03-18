<?php

namespace Libertribes\ForumBundle\Blamer;

use Libertribes\ForumBundle\Entity\Post

class PostBlamer extends AbstractSecurityBlamer
{
    public function blame(Post $post)
    {
        $post->setAuthor($this->security->getToken()->getUser());
    }
}
