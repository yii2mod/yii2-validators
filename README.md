Yii2 validators
===============================================

Collection of useful validators for Yii Framework 2.0

[![Latest Stable Version](https://poser.pugx.org/yii2mod/yii2-validators/v/stable)](https://packagist.org/packages/yii2mod/yii2-validators) [![Total Downloads](https://poser.pugx.org/yii2mod/yii2-validators/downloads)](https://packagist.org/packages/yii2mod/yii2-validators) [![License](https://poser.pugx.org/yii2mod/yii2-validators/license)](https://packagist.org/packages/yii2mod/yii2-validators)
[![Build Status](https://travis-ci.org/yii2mod/yii2-validators.svg?branch=master)](https://travis-ci.org/yii2mod/yii2-validators)

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
* **Credit Card Validator**
```php
    public function rules()
    {
        return [
            [['creditCard'], \yii2mod\validators\ECCValidator::className()],
        ];
    }
```

*  **Yii2 phone validator is a validator uses phone number util to validate and format the phone number attribute of model.**
```php
    public function rules()
    {
        return [
            [['phone'], \yii2mod\validators\PhoneValidator::className(), 'country' => 'US'], // OR
            [['phone'], \yii2mod\validators\PhoneValidator::className(), 'countryAttribute' => 'country'], // OR
            [['phone'], \yii2mod\validators\PhoneValidator::className(), 'countryCodeAttribute' => 'countryCode'], 
        ];
    }
```

