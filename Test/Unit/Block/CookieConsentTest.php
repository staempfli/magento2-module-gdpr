<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\Gdpr\Test\Unit\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Staempfli\Gdpr\Block\CookieConsent;
use Staempfli\Gdpr\Model\Config\Cookie;
use Staempfli\Gdpr\Model\Config\Source\Layout;
use Staempfli\Gdpr\Model\Config\Source\Position;
use Staempfli\Gdpr\Model\Config\Source\Type;

final class CookieConsentTest extends AbstractBlockSetup
{
    /**
     * @var CookieConsent
     */
    private $block;

    public function setUp()
    {
        parent::setUp();
        $cookie = $this->getMockBuilder(Cookie::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->block = new CookieConsent($this->context, $this->setupCookieMethods($cookie), []);
    }

    public function testGetCookieConsentConfiguration()
    {
        $this->assertSame('{"palette":{"popup":{"background":"#000000","text":"#ffffff"},"button":{"background":"#0000f6","text":"#ffffff","border":"#0000f6"}},"content":{"message":"This website uses cookies to ensure you get the best experience on our website.","dismiss":"Got it!","allow":"Allow cookies","deny":"Decline","link":"Learn more","href":"https:\/\/cookiesandyou.com\/"},"position":"bottom","static":false,"theme":"block","type":"default"}', $this->block->getCookieConsentConfiguration());
    }

    public function testIsEnabled()
    {
        $this->assertSame(true, $this->block->isEnabled());
    }

    public function testCookiePositionIsTopPushdown()
    {
        $cookie = $this->getMockBuilder(Cookie::class)
            ->disableOriginalConstructor()
            ->getMock();
        $block = new CookieConsent($this->context, $this->setupCookieMethods($cookie, Position::POSITION_BANNER_TOP_PUSHDOWN), []);
        $this->assertSame('{"palette":{"popup":{"background":"#000000","text":"#ffffff"},"button":{"background":"#0000f6","text":"#ffffff","border":"#0000f6"}},"content":{"message":"This website uses cookies to ensure you get the best experience on our website.","dismiss":"Got it!","allow":"Allow cookies","deny":"Decline","link":"Learn more","href":"https:\/\/cookiesandyou.com\/"},"position":"top","static":true,"theme":"block","type":"default"}', $block->getCookieConsentConfiguration());
    }

    private function setupCookieMethods($block, $position = Position::POSITION_BANNER_BOTTOM)
    {
        $block->expects($this->any())->method('isCookieConsentEnabled')->willReturn(true);
        $block->expects($this->any())->method('getPaletteBackgroundColor')->willReturn('#000000');
        $block->expects($this->any())->method('getPaletteTextColor')->willReturn('#ffffff');
        $block->expects($this->any())->method('getButtonBackgroundColor')->willReturn('#0000f6');
        $block->expects($this->any())->method('getButtonTextColor')->willReturn('#ffffff');
        $block->expects($this->any())->method('getButtonBorderColor')->willReturn('#0000f6');
        $block->expects($this->any())->method('getMessage')->willReturn('This website uses cookies to ensure you get the best experience on our website.');
        $block->expects($this->any())->method('getDismissText')->willReturn('Got it!');
        $block->expects($this->any())->method('getAllowText')->willReturn('Allow cookies');
        $block->expects($this->any())->method('getDenyText')->willReturn('Decline');
        $block->expects($this->any())->method('getLinkText')->willReturn('Learn more');
        $block->expects($this->any())->method('getLinkUrl')->willReturn('https://cookiesandyou.com/');
        $block->expects($this->any())->method('getPosition')->willReturn($position);
        $block->expects($this->any())->method('getLayout')->willReturn(Layout::THEME_BLOCK);
        $block->expects($this->any())->method('getType')->willReturn(Type::TYPE_DEFAULT);
        return $block;
    }
}
