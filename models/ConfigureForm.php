<?php

namespace humhubContrib\auth\konnect\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use humhubContrib\auth\konnect\Module;

/**
 * The module configuration model
 */
class ConfigureForm extends Model
{
    /**
     * @var boolean Enable this authclient
     */
    public $enabled;

    /**
     * @var string the client id provided by Kopano Connect
     */
    public $clientId;

    /**
     * @var string the client secret provided by Kopano Connect
     */
    public $clientSecret;

    /**
     * @var string readonly
     */
    public $redirectUri;

    /**
     * @var string Kopano Connect Issuer URL
     */
    public $issuerUrl;

    /**
     * @var string Kopano Css Icon
     */
    public $cssIcon;

    /**
     * @var string Kopano button label
     */
    public $buttonLabel;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientId', 'issuerUrl', 'cssIcon', 'buttonLabel'], 'required'],
            [['clientSecret', 'issuerUrl'], 'safe'],
            [['enabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enabled' => Yii::t('AuthKonnectModule.base', 'Enabled'),
            'clientId' => Yii::t('AuthKonnectModule.base', 'Client ID'),
            'clientSecret' => Yii::t('AuthKonnectModule.base', 'Client secret'),
            'issuerUrl' => Yii::t('AuthKonnectModule.base', 'Issuer Url'),
            'cssIcon' => Yii::t('AuthKonnectModule.base', 'Kopano Css Icon (FontAwesome)'),
            'buttonLabel' => Yii::t('AuthKonnectModule.base', 'Kopano Button Label'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Loads the current module settings
     */
    public function loadSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-konnect');

        $settings = $module->settings;

        $this->enabled = (boolean)$settings->get('enabled');
        $this->clientId = $settings->get('clientId');
        $this->clientSecret = $settings->get('clientSecret');

        $this->redirectUri = Url::to(['/user/auth/external', 'authclient' => 'konnect'], true);
        $this->issuerUrl = $settings->get('issuerUrl');
        $this->cssIcon = $settings->get('cssIcon');
        $this->buttonLabel = $settings->get('buttonLabel');
    }

    /**
     * Saves module settings
     */
    public function saveSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-konnect');

        $module->settings->set('enabled', (boolean)$this->enabled);
        $module->settings->set('clientId', $this->clientId);
        $module->settings->set('clientSecret', $this->clientSecret);
        $module->settings->set('issuerUrl', $this->issuerUrl);
        $module->settings->set('cssIcon', $this->cssIcon);
        $module->settings->set('buttonLabel', $this->buttonLabel);

        return true;
    }

    /**
     * Returns a loaded instance of this configuration model
     */
    public static function getInstance()
    {
        $config = new static;
        $config->loadSettings();

        return $config;
    }

}
