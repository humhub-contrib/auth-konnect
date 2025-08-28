<?php

use humhub\modules\user\authclient\Collection;

return [
    'id' => 'auth-konnect',
    'class' => 'humhubContrib\auth\konnect\Module',
    'namespace' => 'humhubContrib\auth\konnect',
    'events' => [
        [Collection::class, Collection::EVENT_AFTER_CLIENTS_SET, ['humhubContrib\auth\konnect\Events', 'onAuthClientCollectionInit']],
    ],
];
