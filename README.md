# polyglot
[![Build Status](https://travis-ci.org/MammutAlex/polyglot.svg?branch=master)](https://travis-ci.org/MammutAlex/polyglot)
[![Total Downloads](https://poser.pugx.org/mammut-alex/polyglot/downloads)](https://packagist.org/packages/mammut-alex/polyglot)
[![Latest Stable Version](https://poser.pugx.org/mammut-alex/polyglot/v/stable)](https://packagist.org/packages/mammut-alex/polyglot)
[![License](https://poser.pugx.org/mammut-alex/polyglot/license)](https://packagist.org/packages/mammut-alex/polyglot)

#Installation
Require this package in your `composer.json` and update composer.

```php
"mammut-alex/polyglot": "0.1.*"
```
# Documentation
Translator works with a database, it looks for a prefix code language

Here is an example Migration

```php
    $table->string('name_en');
    $table->string('name_uk');
    $table->string('name_ru');
```

To use polyglot, connect it to your model and use feature for translation.
```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use MammutAlex\Polyglot\Polyglot;

class YouModel extends Model
{
	use Polyglot;
	
	public function name()
    	{
    		return $this->translation('name');
    	}
    ...
```
The function will return the translation in the selected language user

An example of the use in blade:
```
<h1>{{$model->name()}}</h1>
```
