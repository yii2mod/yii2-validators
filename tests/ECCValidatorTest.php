<?php

namespace yii2mod\validators\tests;

use yii\base\DynamicModel;
use yii2mod\validators\ECCValidator;

/**
 * Class ECCValidatorTest
 *
 * @package yii2mod\validators\tests
 */
class ECCValidatorTest extends TestCase
{
    public function testValidateVisa()
    {
        // invalid card number
        $creditCard = 402400716084777;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::VISA]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 4024007160847777;
        $this->assertTrue($model->validate());
    }

    public function testValidateMasterCard()
    {
        // invalid card number
        $creditCard = 528623577209728;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::MASTERCARD]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 5286235772097289;
        $this->assertTrue($model->validate());
    }

    public function testValidateAmericanExpress()
    {
        // invalid card number
        $creditCard = 34429546472054;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::AMERICAN_EXPRESS]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 344295464720540;
        $this->assertTrue($model->validate());
    }

    public function testValidateDiscover()
    {
        // invalid card number
        $creditCard = 601100966223229;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::DISCOVER]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 6011009662232292;
        $this->assertTrue($model->validate());
    }

    public function testDinersClub()
    {
        // invalid card number
        $creditCard = 3668047906690;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::DINERS_CLUB]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 36680479066901;
        $this->assertTrue($model->validate());
    }

    public function testJCB()
    {
        // invalid card number
        $creditCard = 311229671441931;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::JCB]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 3112296714419317;
        $this->assertTrue($model->validate());
    }

    public function testVoyager()
    {
        // invalid card number
        $creditCard = 86998535980759;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::VOYAGER]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 869985359807593;
        $this->assertTrue($model->validate());
    }

    public function testElectron()
    {
        // invalid card number
        $creditCard = 417500840273551;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::ELECTRON]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 4175008402735512;
        $this->assertTrue($model->validate());
    }

    public function testLaser()
    {
        // invalid card number
        $creditCard = 670913703978936;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::LASER]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 6709137039789368;
        $this->assertTrue($model->validate());
    }

    public function testSolo()
    {
        // invalid card number
        $creditCard = 633458050000000;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::SOLO]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 6334580500000000;
        $this->assertTrue($model->validate());
    }

    public function testMaestro()
    {
        // invalid card number
        $creditCard = 676283509877930;
        $model = DynamicModel::validateData(compact('creditCard'), [
            ['creditCard', ECCValidator::className(), 'format' => [ECCValidator::MAESTRO]],
        ]);
        $this->assertTrue($model->hasErrors());

        // valid card number
        $model->creditCard = 6762835098779303;
        $this->assertTrue($model->validate());
    }
}
