<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\Gdpr\Test\Unit\Block;

use Staempfli\Gdpr\Block\CookieConsent;

final class CookieConsentTest extends AbstractBlockSetup
{
    /**
     * @var CookieConsent
     */
    private $block;
    public function setUp()
    {
        parent::setUp();
        $this->block = new CookieConsent($this->context, $this->config, []);
    }
    public function testIsCookieConsentEnabled()
    {
        $this->assertSame(false, $this->block->isCookieConsentEnabled());
    }
}
