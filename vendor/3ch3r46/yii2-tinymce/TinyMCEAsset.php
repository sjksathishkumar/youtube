<?php
namespace a3ch3r46\tinymce;

use yii\web\AssetBundle;

class TinyMCEAsset extends AssetBundle
{
	public $sourcePath = '@a3ch3r46/tinymce/assets';
	
	public $css = [];
	
	public $js = [
		'tinymce.min.js',
	];
}