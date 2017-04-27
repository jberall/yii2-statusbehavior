Status Behavior
===============
A behavior that set the status to 0 when the status_column is set to null.  triggered on BaseActiveRecord::EVENT_BEFORE_INSERT and BaseActiveRecord::EVENT_BEFORE_UPDATE

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jberall/yii2-statusbehavior "*"
```

or add

```
"jberall/yii2-statusbehavior": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
    public function behaviors() {
        
        $behaviors = [

            'statusBehavior' => [
				'class' => \frontend\behaviors\StatusBehavior::className(),
				'status_column' => 'status_id',
				
			],
        ];
        return ArrayHelper::merge(parent::behaviors(),$behaviors);

    }  