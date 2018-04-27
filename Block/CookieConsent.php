<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\Gdpr\Block;

use Magento\Framework\View\Element\Template;
use Staempfli\Gdpr\Model\Config;

class CookieConsent extends Template
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    public function isCookieConsentEnabled()
    {
        return $this->config->isCookieConsentEnabled();
    }
}
