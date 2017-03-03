<?php

namespace MammutAlex\Polyglot\Test\Models;

use MammutAlex\Polyglot\Polyglot;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Polyglot;

    protected $table = 'articles';

    public function title()
    {
        return $this->translation('title');
    }

    public function text()
    {
        return $this->translation('text');
    }

    public function textRu()
    {
        return $this->translation('text', 'ru');
    }

    public function textYouLang($lang)
    {
        return $this->translation('text', $lang);
    }
}
