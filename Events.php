<?php

namespace humhubContrib\auth\konnect;

use humhub\components\Event;
use humhub\modules\user\authclient\Collection;
use humhubContrib\auth\konnect\authclient\KonnectAuth;
use humhubContrib\auth\konnect\models\ConfigureForm;

class Events
{
    /**
     * @param Event $event
     */
    public static function onAuthClientCollectionInit($event)
    {
        /** @var Collection $authClientCollection */
        $authClientCollection = $event->sender;

        if (!empty(ConfigureForm::getInstance()->enabled)) {
            $authClientCollection->setClient('konnect', [
                'class' => KonnectAuth::class,
                'clientId' => ConfigureForm::getInstance()->clientId,
                'clientSecret' => ConfigureForm::getInstance()->clientSecret,
            ]);
        }
    }

}
