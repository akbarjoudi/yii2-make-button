<?php
use yii\helpers\Html;
?>
<?= Html::button(
    $widget->text, 
    array_merge(['class' => 'btn btn-1 btn-1a'], $widget->generateOptions())
)?>