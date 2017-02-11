<?php
namespace aki\button\assetBundle;

\Yii::setAlias('@assets', dirname(__DIR__));
/**
 * Description of buttonAsset
 *
 * @author user
 */
class CreativeAsset extends \yii\web\AssetBundle{
    public $sourcePath = '@assets/assets/creative';
    public $css = [
        'css/component.css'
    ]; 
}
