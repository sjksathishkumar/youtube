3ch3r46/yii2-tinymce
===============
The TinyMCE Extension for yii framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist 3ch3r46/yii2-tinymce "1.0.0"
```

or add

```
"3ch3r46/yii2-tinymce": "1.0.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

~~~
[php]
use a3ch3r46\tinymce\TinyMCE;

echo TinyMCE::widget(['name' => 'text-content']);

$form->field($model, 'attribute')->widget(TinyMCE::widget());

//toggle to tinyMCE or to textarea

echo TinyMCE::widget(['name' => 'text-content', 'toggle' => ['active' => true]]);

$form->field($model, 'attribute')->widget(TinyMCE::widget(), [
	'toggle' => [
		'active' => true,
	]
]);
~~~
