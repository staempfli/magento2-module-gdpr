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
    /**
     * @var bool
     */
    private $isStatic = false;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    public function isEnabled()
    {
        return $this->config->isCookieConsentEnabled();
    }

    public function getCookiePosition()
    {
        $position = $this->config->getCookiePosition();

        if ($position === Config\Source\Position::POSITION_BANNER_TOP_PUSHDOWN) {
            $position = 'top';
            $this->isStatic = true;
        }
        return $position;
    }

    public function isStatic()
    {
        return $this->isStatic;
    }

    public function getCookieConsentConfiguration()
    {
        $config = ['palette' => [
            'popup' => [
                'background' => '#000'
            ],
            'button' => [
                'background' => '#fff'
            ]
        ],
            'position' => $this->getCookiePosition(),
            'static' => $this->isStatic()
        ];

        return json_encode($config);
    }
}
