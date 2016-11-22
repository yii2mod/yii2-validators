<?php

namespace yii2mod\validators;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use Yii;
use yii\validators\Validator;

/**
 * Phone validator class that validates phone numbers for given
 * country and formats.
 * Country codes and attributes value should be ISO 3166-1 alpha-2 codes
 */
class PhoneValidator extends Validator
{
    /**
     * @var bool If country is not set or selected adds error
     */
    public $strict = true;
    /**
     * @var string The country is fixed
     */
    public $country;
    /**
     * @var string The country attribute of model
     */
    public $countryAttribute;
    /**
     * @var string
     */
    public $countryCodeAttribute;
    /**
     * @var bool If phone number is valid formats value with international phone number
     */
    public $format = true;
    /**
     * @var string
     */
    public $message = 'Phone number does not seem to be a valid phone number';
    /**
     * @var string
     */
    public $strictModeMessage = 'For phone validation country property is required';
    /**
     * @var string
     */
    public $numberParseExceptionMessage = 'Unexpected Phone Number Format';

    /**
     * Validate attribute
     *
     * @param \yii\base\Model $model
     * @param string $attribute
     *
     * @return bool|void
     */
    public function validateAttribute($model, $attribute)
    {
        $country = '';
        if ($this->country !== null) {
            $country = $this->country;
        } elseif ($this->countryAttribute !== null) {
            $country = $model->{$this->countryAttribute};
        } elseif ($this->countryCodeAttribute !== null) {
            $country = $model->{$this->countryCodeAttribute};
        }
        // if empty country and used strict mode
        if (empty($country) && $this->strict) {
            $this->addError($model, $attribute, Yii::t('app', $this->strictModeMessage));

            return false;
        }
        if (empty($country)) {
            return true;
        }
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $numberProto = $phoneUtil->parse($model->$attribute, $country);
            if ($phoneUtil->isValidNumber($numberProto)) {
                if ($this->format) {
                    $model->$attribute = $phoneUtil->format($numberProto, PhoneNumberFormat::INTERNATIONAL);
                }

                return true;
            } else {
                $this->addError($model, $attribute, Yii::t('app', $this->message));

                return false;
            }
        } catch (NumberParseException $e) {
            $this->addError($model, $attribute, Yii::t('app', $this->numberParseExceptionMessage));
        }
    }
}
