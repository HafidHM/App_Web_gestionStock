<?php

class Article_Desire
{
    private  $id_article_desire;

    public function __construct($id_article_desire)
    {
        $this->id_article_desire = $id_article_desire;
    }

    public function getIdArticleDesire()
    {
        return $this->id_article_desire;
    }
    public function setIdArticleDesire($id_article_desire)
    {
        $this->id_article_desire = $id_article_desire;
    }
}