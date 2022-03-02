<?php

namespace App\Model\Entity;

class Comment
{

    private ?int $id;
    private string $content;
    private User $author;
    private Article $article;

}