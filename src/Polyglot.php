<?php

/**
 * Created by PhpStorm.
 * User: mammut
 * Date: 07.02.17
 * Time: 10:40
 */
namespace MammutAlex\Polyglot;

use Illuminate\Support\Facades\App;
/**
 * Class Polyglot translation model data
 *
 * @package App
 */
trait Polyglot
{
	/**
	 * Translation data from DB
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function translation($name)
	{
		return $this->{$name.'_'.App::getLocale()};
	}
}