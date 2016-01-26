<?php

namespace LTF\Events;

use LTF\Article;
use Illuminate\Queue\SerializesModels;

/**
 * Class ArticleWasViewed
 * @package LTF\Events
 */
class ArticleWasViewed extends Event
{
    use SerializesModels;

    /**
     * @var Article
     */
    public $article;

    /**
     * Create a new event instance.
     *
     * @param  Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}
