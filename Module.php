<?php

namespace humhubContrib\auth\konnect;

use yii\helpers\Url;

/**
 * @inheritdoc
 */
class Module extends \humhub\components\Module
{
    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/auth-konnect/admin']);
    }
}
