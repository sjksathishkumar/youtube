<?php
namespace a3ch3r46\tinymce;

use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;
use yii\helpers\Html;
/**
 * TinyMCE Extension.
 * TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control.
 * TinyMCE has the ability to convert HTML TEXTAREA fields or other HTML elements to editor instances.
 * 
 * 
 * ~~~
 * [php]
 * use a3ch3r46\tinymce\TinyMCE;
 * 
 * echo TinyMCE::widget(['name' => 'text-content']);
 * 
 * $form->field($model, 'attribute')->widget(TinyMCE::widget());
 * ~~~
 * 
 * 
 * @author Moh Khoirul Anam <3ch3r46@gmail.com>
 * @copyright 2014
 * @since 1
 */
class TinyMCE extends InputWidget
{
	public $config = [];
	
	public $selector;
	/**
	 * @var boolean to enable or disable advanced tab in image.
	 */
	public $showAdvancedImageTab = true;
	/**
	 * @var string theme of tiny mce
	 */
	public $theme = 'modern';
	/**
	 * @var array to toggling a textarea to tinyMCE and to textarea.
	 */
	protected $toggle = [
		'active' => false,
		'button' => [
			'show' => true,
			'toggle' => ['label' => 'Tiny MCE', 'options' => ['class' => 'btn btn-default']],
			'unToggle' => ['label' => 'Textarea', 'options' => ['class' => 'btn btn-default']]
		],
		'addon' => [
			'before' => '',
			'after' => '',
		],
		'tinyStart' => true,
	];
	/**
	 * @var array tiny mce plugin
	 */
	public $plugins = [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor',
	];
	/**
	 * @var array to show the toolbar.
	 */
	public $toolbar = [
		'insertfile undo redo',
		'styleselect',
		'fontselect,fontsizeselect',
		'bold italic',
		'alignleft aligncenter alignright alignjustify',
		'bullist numlist outdent indent',
		'link image',
		'forecolor backcolor',
		'print preview media',
		
	];

	/**
	 * @var array to remove the default toolbar
	 */
	public $removeToolbar = [];
	/**
	 * @var array text template
	 */
	public $templates = [];
	/**
	 * @var integer set the tinyMCE height.
	 */
	public $height = 250;
        
	/**
	 * @var string set this to call this tiny mce with function.
	 */
	public $functionName;
	
	public function __set($name, $value)
	{
		if (method_exists($this, 'set' . ucfirst($name)))
			parent::__set($name, $value);
		elseif (isset($this->{$name}))
			$this->{$name} = $value;
		else
			$this->config[$name] = $value;
	}
	
	public function setToggle($value)
	{
		$this->toggle = array_merge($this->toggle, $value);
	}
	
	public function init()
	{
		parent::init();
		$this->config = ArrayHelper::merge([
			'theme' => $this->theme,
			'plugins' => $this->plugins,
			'templates' => $this->templates,
			'height' => $this->height,
		], $this->config);
		
		if (!isset($this->options['rows']))
			$this->options['rows'] = 10;
				
		if (!empty($this->toolbar))
			$this->config['toolbar'] = implode(' | ', $this->toolbar);
		
		if (!empty($this->removeToolbar)) {
			foreach ($this->removeToolbar as $toolbar) {
				$this->config['toolbar'] = str_replace($toolbar, '', $this->config['toolbar']);
			}
		}
		
		if ($this->toggle['active'])
		{
			if (!isset($this->toggle['id']))
				$this->toggle['id'] = $this->getId();
		}
		
		if ($this->showAdvancedImageTab)
			$this->config['image_advtab'] = 'true';
	}
	
	public function run()
	{
		$this->registerPlugin();
		return $this->renderInput();
	}
	
	protected function renderInput()
	{
		if ($this->hasModel())
			$input = Html::activeTextarea($this->model, $this->attribute, $this->options);
		else 
			$input = Html::textarea($this->name, $this->value, $this->options);
		
		if ($this->toggle['active'])
			$input = $this->prepareToggle($input);
		
		return $input;
	}
	
	protected function prepareToggle($input)
	{
		$buttonToggle = $this->toggle['button']['toggle'];
		$buttonUnToggle = $this->toggle['button']['unToggle'];
		
		$buttonToggle['options']['onclick'] = 'js:toggleTiny'.$this->toggle['id'].'()';
		$buttonUnToggle['options']['onclick'] = 'js:unToggleTiny'.$this->toggle['id'].'()';
		
		$toggle = Html::a($buttonToggle['label'], '#', $buttonToggle['options']);
		$unToggle = Html::a($buttonUnToggle['label'], '#', $buttonUnToggle['options']);
		
		$toggle = $this->toggle['addon']['before'] . $toggle . $unToggle . $this->toggle['addon']['after'];
		return $toggle.$input;
	}
	
	protected function registerPlugin()
	{
		$view = $this->getView();
		
		if (isset($this->selector))
			$id = $this->selector;
		else
			$id = '#' . $this->options['id'];
		
		$this->config = ArrayHelper::merge(['selector' => $id], $this->config);
		
		$options = JSON::encode($this->config);
		
		TinyMCEAsset::register($view);
		
		if ($this->toggle['active']) {
			$toggle = $this->toggle['id'];
			$start = '';
			if ($this->toggle['tinyStart']) {
				$start = 'toggleTiny'.$toggle . '();';
			}
			$view->registerJs("toggleTiny{$toggle}=function(){tinymce.init({$options});};\nunToggleTiny{$toggle}=function(){tinymce.remove('{$id}')};\n$start");
		} elseif (isset($this->functionName)) {
			$view->registerJs("{$this->functionName}=function(){tinymce.init({$options})}");
		} else
			$view->registerJs("tinymce.init({$options})");
	}
}
