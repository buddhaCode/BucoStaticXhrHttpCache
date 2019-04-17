<?php

namespace BucuStaticXhrHttpCache;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class BucuStaticXhrHttpCache extends Plugin
{
    public function install(InstallContext $context)
    {
        $context->scheduleClearCache([InstallContext::CACHE_TAG_PROXY]);
    }

    public function uninstall(UninstallContext $context)
    {
        $context->scheduleClearCache([InstallContext::CACHE_TAG_PROXY]);
    }
}