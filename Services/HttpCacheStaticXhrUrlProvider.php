<?php

namespace BucuStaticXhrHttpCache\Services;

use Shopware\Components\HttpCache\UrlProvider\StaticProvider;
use Shopware\Components\Routing\Context;

class HttpCacheStaticXhrUrlProvider extends StaticProvider
{
    const NAME = 'bucuStaticXhr';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrls(Context $context, $limit = null, $offset = null)
    {
        $qb = $this->getBaseQuery()
            ->addSelect(['id', 'link'])
            ->setParameter(':shop', $context->getShopId())
            ->orderBy('id');

        if ($limit !== null && $offset !== null) {
            $qb->setFirstResult($offset)
                ->setMaxResults($limit);
        }

        $result = $qb->execute()->fetchAll();

        if (!count($result)) {
            return [];
        }

        return $this->router->generateList(
            array_filter(array_map(
                function ($custom) {
                    if (empty($custom['link']) || !$this->isShopwareLink($custom['link'])) {
                        return ['sViewport' => 'custom', 'sCustom' => $custom['id'], 'isXHR' => 1];
                    }
                    return null;
                },
                $result
            )),
            $context
        );
    }

    /**
     * @param string $link
     *
     * @return bool
     */
    private function isShopwareLink($link)
    {
        return strpos($link, 'shopware.php') !== false;
    }
}
