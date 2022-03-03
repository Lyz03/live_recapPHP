<?php

namespace App\Model\Entity;

class Comment extends AbstractEntity
{

    private string $content;
    private User $author;
    private Article $article;

}