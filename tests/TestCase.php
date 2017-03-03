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
        $this->seedArticles();
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

    private function seedArticles()
    {
        DB::table('articles')->insert([
            'title_en' => 'Hello Word',
            'title_ru' => 'Привет Мир',
            'title_uk' => 'Привіт Світ',
            'text_en' => 'Text about hello word',
            'text_ru' => 'Текст о привет мир',
            'text_uk' => 'Текст про привіт світ',
        ]);
    }
}
