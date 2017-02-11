Make button
===========
For make button

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require aki/yii2-make-button "*"
```

or add

```
"aki/yii2-make-button": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \aki\button\MakeButton::widget([
	'text' => '<i class="fa fa-edit"></i> hello',
]); ?>
```

also create ajax request
sample :

```php
<?= aki\button\MakeButton::widget([
        'text' => '<i class="fa fa-edit"></i> hello',
        'ajax' => [
            'onSendRequest' => 'click',
            'url' => Url::toRoute(['post/index']),
            'type' => 'POST',
            'success' => new yii\web\JsExpression('
                function(data){
                    alert(data);
                }
            '),
            'data' => new yii\web\JsExpression("datafrom('#form')"),
        ]
]);?>
```

also diffrent skin exists

styles : 
```
bootstrap
createive
```
set skin ```creative```
```php
<?= aki\button\MakeButton::widget([
        'text' => '<span>Add to cart</span>',
        'skin' => 'creative',
        'options' => [
            'class' => aki\button\MakeButton::style()->creative->btn3e_send
        ],
]);?>
```