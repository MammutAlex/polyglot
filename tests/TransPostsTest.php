<?php

namespace MammutAlex\Polyglot\Test;

use Illuminate\Support\Facades\App;
use MammutAlex\Polyglot\Test\Models\Post;

class TransPostsTest extends TestCase
{

    public function testTitleLocale()
    {
        $post = Post::find(1);

        App::setLocale('ru');
        $this->assertTrue($post->title() == 'Привет Мир');

        App::setLocale('uk');
        $this->assertTrue($post->title() == 'Привіт Світ');

        App::setLocale('en');
        $this->assertTrue($post->title() == 'Hello Word');
    }


    public function testTextLocale()
    {
        $post = Post::find(1);

        App::setLocale('en');
        $this->assertTrue($post->text() == 'Text about hello word');

        App::setLocale('ru');
        $this->assertTrue($post->text() == 'Текст о привет мир');

        App::setLocale('uk');
        $this->assertTrue($post->text() == 'Текст про привіт світ');
    }


    public function testTransToRuInLangEn()
    {
        $post = Post::find(1);

        App::setLocale('en');
        $this->assertTrue($post->textRu() == 'Текст о привет мир');
    }


    public function testTransToYouLangInLangEn()
    {
        $post = Post::find(1);

        App::setLocale('en');
        $this->assertTrue($post->textYouLang('ru') == 'Текст о привет мир');
    }
}
