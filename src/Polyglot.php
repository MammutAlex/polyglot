<?php

/**
 * Created by PhpStorm.
 * User: mammut
 * Date: 07.02.17
 * Time: 10:40.
 */

namespace MammutAlex\Polyglot;

use Illuminate\Support\Facades\App;

/**
 * Class Polyglot translation model data.
 */
trait Polyglot
{
    /**
     * Translation data from DB.
     *
     * @param      $name
     * @param      $locale
     *
     * @return mixed
     */
    public function translation($name, $locale = null)
    {
        if ($locale) {
            return $this->templateMultiLangColumn($name, $locale);
        }

        return $this->transLaravelLocale($name);
    }

    /**
     * Trans data width laravel locale.
     *
     * @param $name
     *
     * @return mixed
     */
    private function transLaravelLocale($name)
    {
        return $this->templateMultiLangColumn($name, App::getLocale());
    }

    /**
     * Trans data width customer locale.
     *
     * @param $name
     * @param $locale
     *
     * @return mixed
     */
    private function templateMultiLangColumn($name, $locale)
    {
        return $this->{$name.'_'.$locale};
    }
}
