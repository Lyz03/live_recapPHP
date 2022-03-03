<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use DateTime;

class ArticleManager
{

    private const TABLENAME = 'article';

    public function getAll(): array {

        $articles = [];
        $query = DB::getConnection()->query("SELECT * FROM " . self::TABLENAME);

        if($query) {
            $userManager = (new UserManager());
            $format = "Y-m-d H:i:s";

            foreach ($query->fetchAll() as $value) {
                $articles[] = (new Article())
                    ->setId($value['id'])
                    ->setTitle($value['title'])
                    ->setAuthor(($userManager->getUserById($value['user_fk'])[0]))
                    ->setContent($value['content'])
                    ->setDateAdd(DateTime::createFromFormat($format, $value['date_add']))
                    ->setDateUpdate(DateTime::createFromFormat($format, $value['date_update']));
            }
        }

        return $articles;
    }
}