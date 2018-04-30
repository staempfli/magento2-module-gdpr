<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\Gdpr\Block;

use Magento\Framework\View\Element\Template;
use Staempfli\Gdpr\Model\Config\Cookie as CookieConfig;
use Staempfli\Gdpr\Model\Config\Source\Position;

class CookieConsent extends Template
{
    /**
     * @var CookieConfig
     */
    private $config;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CookieConfig $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    public function isEnabled()
    {
        return $this->config->isCookieConsentEnabled();
    }

    public function getCookieConsentConfiguration()
    {
        $config = [
            'palette' => [
                'popup' => [
                    'background' => $this->config->getPaletteBackgroundColor(),
                    'text' => $this->config->getPaletteTextColor(),
                ],
                'button' => [
                    'background' => $this->config->getButtonBackgroundColor(),
                    'text' => $this->config->getButtonTextColor(),
                    'border' =>$this->config->getButtonBorderColor(),
                ]
            ],
            'content' => [
                'message' => $this->config->getMessage(),
                'dismiss' => $this->config->getDismissText(),
                'allow' => $this->config->getAllowText(),
                'deny' => $this->config->getDenyText(),
                'link' => $this->config->getLinkText(),
                'href' => $this->config->getLinkUrl()
            ],
            'position' => $this->getCookiePosition(),
            'static' => $this->isStatic(),
            'theme' => $this->config->getLayout(),
            'type' => $this->config->getType(),
        ];

        return json_encode($config);
    }

    private function getCookiePosition()
    {
        $position = $this->config->getPosition();

        if ($position === Position::POSITION_BANNER_TOP_PUSHDOWN) {
            $position = 'top';
        }
        return $position;
    }

    private function isStatic()
    {
        if ($this->config->getPosition() === Position::POSITION_BANNER_TOP_PUSHDOWN) {
            return true;
        }
        return false;
    }
}
