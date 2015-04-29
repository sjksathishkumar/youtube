<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace yii\datepicker;

use yii\web\AssetBundle;

/**
 * DateRangePickerAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\datepicker
 */
class DateRangePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/yiisoft/yii2-date-picker/assets';

    public $css = [
        'css/daterangepicker.css'
    ];

    public $depends = [
        'dosamigos\datepicker\DatePickerAsset'
    ];

} 
