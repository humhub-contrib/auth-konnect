<?php

namespace humhubContrib\auth\konnect\authclient;

use yii\authclient\OpenIdConnect;

/**
 * Kopano allows authentication via Kopano Connect OAuth.
 */
class KonnectAuth extends OpenIdConnect
{
    /**
     * @var string OpenID Issuer (provider) base URL, e.g. `https://example.com`.
     */
    public $issuerUrl = "https://kopano.dev";

    /**
     * @inheritdoc
     * @notice not fully supported until HumHub 1.8.
     */
    public $validateJws = false;

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-plug',
            'buttonBackgroundColor' => '#e0492f',
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
}
