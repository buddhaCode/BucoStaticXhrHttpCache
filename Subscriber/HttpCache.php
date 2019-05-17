<?php

namespace BucoStaticXhrHttpCache\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Models\Form\Field;
use Shopware\Models\Form\Form;
use Shopware\Models\Site\Site;

class HttpCache implements SubscriberInterface
{
    /**
     * @var \Enlight_Event_EventManager
     */
    private $events;

    public function __construct(\Enlight_Event_EventManager $events)
    {
        $this->events = $events;
    }

    public static function getSubscribedEvents() : array
    {
        return [
            'Shopware\Models\Site\Site::postRemove' => 'onSiteChange',
        ];
    }

    public function onSiteChange(\Enlight_Event_EventArgs $args)
    {
        /** @var Form|Field $entity */
        $entity = $args->get('entity');

        if($entity instanceof Site) {
            $id = $entity->getId();
        }
        else {
            return;
        }

        $this->events->notify(
            'Shopware_Plugins_HttpCache_InvalidateCacheId',
            ['cacheId' => 's' . $id]
        );
    }
}