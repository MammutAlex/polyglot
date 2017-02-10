<?php
namespace MammutAlex\Polyglot\Test\Models;

use Illuminate\Database\Eloquent\Model;
use MammutAlex\Polyglot\Polyglot;

class Article extends Model
{
	use Polyglot;

	public function title()
	{
		return $this->translation('title');
	}

	public function text()
	{
		return $this->translation('text');
	}

	public function hello()
	{
		return 'hello word';
	}

	protected $table = 'articles';
	protected $guarded = [];
}