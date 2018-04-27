<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\Gdpr\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_GDPR_ENABLE_COOKIE_CONSENT = 'gdpr/cookie_consent/enable';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isCookieConsentEnabled()
    {
        return (bool) $this->scopeConfig->isSetFlag(self::XML_PATH_GDPR_ENABLE_COOKIE_CONSENT);
    }
}
