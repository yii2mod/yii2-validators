Yii2 validators
===============================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2mod/yii2-validators "*"
```

or add

```
"yii2mod/yii2-validators": "*"
```

to the require section of your `composer.json` file.

Usage
-----
1. ECCValidator
```php
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['creditCard'], \yii2mod\validators\ECCValidator::className()],
        ];
    }
```

