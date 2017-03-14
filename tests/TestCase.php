<?php

namespace MammutAlex\Polyglot\Test;

use Tests\CreatesApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        file_put_contents($this->getTempDirectory().'/database.sqlite', null);
        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => $this->getTempDirectory().'/database.sqlite',
            'prefix'   => '',
        ]);
        $this->migrate();
    }

    public function getTempDirectory()
    {
        return __DIR__.'/temp';
    }

    public function migrate()
    {
        $this->createArticles();
        $this->createPosts();
        $this->seedArticles();
        $this->seedPosts();
    }

    private function createArticles()
    {
        Schema::create('articles', function ($table) {
            $table->increments('id');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_uk');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('text_uk');
            $table->timestamps();
        });
    }

    private function createPosts()
    {
        Schema::create('posts', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->string('ru_lang_title');
            $table->string('uk_lang_title');
            $table->text('text');
            $table->text('ru_lang_text');
            $table->text('uk_lang_text');
            $table->timestamps();
        });
    }

    private function seedArticles()
    {
        DB::table('articles')->insert([
            'title_en' => 'Hello Word',
            'title_ru' => 'Привет Мир',
            'title_uk' => 'Привіт Світ',
            'text_en'  => 'Text about hello word',
            'text_ru'  => 'Текст о привет мир',
            'text_uk'  => 'Текст про привіт світ',
        ]);
    }

    private function seedPosts()
    {
        DB::table('posts')->insert([
            'title' => 'Hello Word',
            'ru_lang_title' => 'Привет Мир',
            'uk_lang_title' => 'Привіт Світ',
            'text'  => 'Text about hello word',
            'ru_lang_text'  => 'Текст о привет мир',
            'uk_lang_text'  => 'Текст про привіт світ',
        ]);
    }
}
