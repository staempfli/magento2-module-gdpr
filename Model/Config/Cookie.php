<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\Gdpr\Model\Config;

use Staempfli\Gdpr\Model\Config;

class Cookie extends Config
{
    const XML_PATH_GDPR_COOKIE_CONSENT_ENABLE = 'gdpr/cookie/enabled';
    const XML_PATH_GDPR_COOKIE_POSITION = 'gdpr/cookie/position';
    const XML_PATH_GDPR_COOKIE_TYPE = 'gdpr/cookie/type';
    const XML_PATH_GDPR_COOKIE_LAYOUT = 'gdpr/cookie/layout';
    const XML_PATH_GDPR_COOKIE_PALETTE_BACKGROUND = 'gdpr/cookie/palette_background';
    const XML_PATH_GDPR_COOKIE_PALETTE_TEXT = 'gdpr/cookie/palette_text';
    const XML_PATH_GDPR_COOKIE_BUTTON_BACKGROUND = 'gdpr/cookie/button_background';
    const XML_PATH_GDPR_COOKIE_BUTTON_BORDER = 'gdpr/cookie/button_border';
    const XML_PATH_GDPR_COOKIE_BUTTON_TEXT = 'gdpr/cookie/button_text';
    const XML_PATH_GDPR_COOKIE_MESSAGE = 'gdpr/cookie/message';
    const XML_PATH_GDPR_COOKIE_DISMISS = 'gdpr/cookie/dismiss';
    const XML_PATH_GDPR_COOKIE_ALLOW = 'gdpr/cookie/allow';
    const XML_PATH_GDPR_COOKIE_DENY = 'gdpr/cookie/deny';
    const XML_PATH_GDPR_COOKIE_LINK_TEXT = 'gdpr/cookie/link_text';
    const XML_PATH_GDPR_COOKIE_LINK_URL = 'gdpr/cookie/link_url';

    public function isCookieConsentEnabled()
    {
        return $this->isSetFlag(self::XML_PATH_GDPR_COOKIE_CONSENT_ENABLE);
    }

    public function getPosition()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_POSITION);
    }

    public function getType()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_TYPE);
    }

    public function getMessage()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_MESSAGE);
    }

    public function getDismissText()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_DISMISS);
    }

    public function getAllowText()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_ALLOW);
    }

    public function getDenyText()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_DENY);
    }

    public function getLinkText()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_LINK_TEXT);
    }

    public function getLinkUrl()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_LINK_URL);
    }

    public function getLayout()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_LAYOUT);
    }

    public function getPaletteBackgroundColor()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_PALETTE_BACKGROUND);
    }

    public function getPaletteTextColor()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_PALETTE_TEXT);
    }

    public function getButtonBackgroundColor()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_BUTTON_BACKGROUND);
    }

    public function getButtonTextColor()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_BUTTON_TEXT);
    }

    public function getButtonBorderColor()
    {
        return $this->getValue(self::XML_PATH_GDPR_COOKIE_BUTTON_BORDER);
    }
}
