<?php

namespace yii2mod\validators\tests;

use yii\base\DynamicModel;

/**
 * Class PhoneValidatorTest
 * @package yii2mod\validators\tests
 */
class PhoneValidatorTest extends TestCase
{
    public function testInvalidPhoneNumber()
    {
        $phone = 123123123;
        $model = DynamicModel::validateData(compact('phone'), [
            ['phone', \yii2mod\validators\PhoneValidator::className(), 'country' => 'US'],
        ]);
        $this->assertTrue($model->hasErrors());
    }

    public function testValidPhoneNumber()
    {
        $phone = '718-494-0022';
        $model = DynamicModel::validateData(compact('phone'), [
            ['phone', \yii2mod\validators\PhoneValidator::className(), 'country' => 'US'],
        ]);
        $this->assertEmpty($model->getErrors());
    }
}