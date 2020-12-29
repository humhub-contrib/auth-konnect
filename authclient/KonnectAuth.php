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
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'displayName',
            'firstname' => function ($attributes) {
                if (!isset($attributes['given_name'])) {
                    return '';
                }

                return $attributes['given_name'];
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['family_name'])) {
                    return '';
                }

                return $attributes['family_name'];
            },
            'title' => 'tagline',
            'email' => function ($attributes) {
                return $attributes['email'];
            },
        ];
    }
}
