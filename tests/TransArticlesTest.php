<?php

namespace MammutAlex\Polyglot\Test;

use Illuminate\Support\Facades\App;
use MammutAlex\Polyglot\Test\Models\Article;

class TransArticlesTest extends TestCase
{
    public function testTitleLocale()
    {
        $article = Article::find(1);

        App::setLocale('ru');
        $this->assertTrue($article->title() == 'Привет Мир');

        App::setLocale('uk');
        $this->assertTrue($article->title() == 'Привіт Світ');

        App::setLocale('en');
        $this->assertTrue($article->title() == 'Hello Word');
    }

    public function testTextLocale()
    {
        $article = Article::find(1);

        App::setLocale('en');
        $this->assertTrue($article->text() == 'Text about hello word');

        App::setLocale('ru');
        $this->assertTrue($article->text() == 'Текст о привет мир');

        App::setLocale('uk');
        $this->assertTrue($article->text() == 'Текст про привіт світ');
    }

    public function testTransToRuInLangEn()
    {
        $article = Article::find(1);

        App::setLocale('en');
        $this->assertTrue($article->textRu() == 'Текст о привет мир');
    }

    public function testTransToYouLangInLangEn()
    {
        $article = Article::find(1);

        App::setLocale('en');
        $this->assertTrue($article->textYouLang('ru') == 'Текст о привет мир');
    }
}
