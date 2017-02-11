<?php

namespace aki\button;
use Yii;
/**
 * This is just an example.
 */
class MakeButton extends \yii\bootstrap\Widget
{

    /**
     * text button
     * @var string
     */
    public $text;
    
    /**
     * skin for button
     * @var string 
     */
    public $skin = 'bootstrap';
    
    /**
     *  options request ajax
     * @var Array
     */
    public $ajax;
    
    /**
     *
     * @var \aki\button\components\Style
     */
    public static function style(){
        return new components\Style();
    }


    /**
     * inisialize
     */
    public function init() {
        parent::init();
        $class = trim('aki\button\assetBundle\ ').ucfirst($this->skin).'Asset';
        Yii::$app->view->registerAssetBundle($class);
        $this->makeRequestAjax();
    }
    
    public function run()
    {
        return $this->render('index', [
            'widget' => $this
        ]);
    }
    
    /**
     * generate options for button 
     * use the method in view
     * @return Array
     */
    public function generateOptions() {
        $str = [];
        if(is_array($this->options)){
            foreach ($this->options as $key => $value) {
                $str[$key]= $value;
            }
            return $str;
        }
    }
    
    
    public function makeRequestAjax() {
        if(is_array($this->ajax)){
            //event on request
            $eventRequest = isset($this->ajax['onSendRequest']) ? $this->ajax['onSendRequest']: 'click';
            unset($this->ajax['onSendRequest']);
            
            //serialize data of the form
            if(isset($this->ajax['data']) && $this->ajax['data'] instanceof \yii\web\JsExpression){
                $datafrom = $this->ajax['data']->expression; 
                unset($this->ajax['data']);
            }
            
            //init
            $strjs = '';
            foreach ($this->ajax as $key => $value) {
                if($value instanceof \yii\web\JsExpression){
                    $strjs .= trim($key .":". $value->expression.",");
                }
                else{
                    if(is_string($value)){
                        $strjs .= $key .":'". $value."',";
                    }
                }
            }
            
            $function = "
                function datafrom(id){
                    form = $(id);
                    $('#$this->id').$eventRequest(function(){
                        data = form.serialize();
                        $.ajax({
                            $strjs
                            data:data
                        });
                    })
                }
            ";
            $js = "
                $('#$this->id').$eventRequest(function(){
                    $.ajax({
                        $strjs
                    });
                })
            ";
            $js = !empty($datafrom) ? $datafrom."\n".$function:$js;
            
            //add javascript to page
            $this->view->registerJs($js, \yii\web\View::POS_END);
        }
    }
}
