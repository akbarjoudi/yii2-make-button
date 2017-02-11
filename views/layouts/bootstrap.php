<?php
use yii\helpers\Html;
?>
<?= Html::button(
    $widget->text, 
    array_merge(['class' => 'btn btn-success'], $widget->generateOptions())
)?>