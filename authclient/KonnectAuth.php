<?php

namespace humhubContrib\auth\konnect\authclient;

use humhubContrib\auth\konnect\Module;
use Yii;
use yii\authclient\OpenIdConnect;

/**
 * Kopano allows authentication via Kopano Connect OAuth.
 */
class KonnectAuth extends OpenIdConnect
{
    /**
     * @var string OpenID Issuer (provider) base URL, e.g. `https://example.com`.
     */
    public $issuerUrl;

    /**
     * @inheritdoc
     * @notice not fully supported until HumHub 1.8.
     */
    public $validateJws = false;

    /**
     * @var string Kopano Css Icon
     */
    public $cssIcon;

    /**
     * @var string Kopano button label
     */
    public $buttonLabel;

    public function __construct()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-konnect');

        $this->issuerUrl = $module->settings->get('issuerUrl');
        Yii::$app->cache->set('issuerUrl', $this->issuerUrl);
        Yii::$app->cache->set('issuer', $this->issuerUrl);
        Yii::error(777);
        Yii::error(Yii::$app->cache);
//        if($this->issuerUrl){
//
//        }

        $this->cssIcon = $module->settings->get('cssIcon');
        $this->buttonLabel = $module->settings->get('buttonLabel');
        parent::__construct();
    }

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-' . $this->cssIcon,
            'buttonBackgroundColor' => '#e0492f',
            'buttonLabel' => $this->buttonLabel,
        ];
    }

    /**
     * @inheritdoc
     */
    public $scope = 'openid email profile';

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'id' => 'sub',
            'username' => 'preferred_username',
            'firstname' => 'given_name',
            'lastname' => 'family_name',
        ];
    }

    /**
     * @return string service title.
     */
    public function getTitle(){
        return $this->buttonLabel;
    }
}
