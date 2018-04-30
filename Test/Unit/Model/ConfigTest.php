<?php
declare(strict_types=1);
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */
namespace Staempfli\Gdpr\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Staempfli\Gdpr\Model\Config;

final class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    private $config;
    public function setUp()
    {
        $scopeConfigInterface = $this->getMockBuilder(ScopeConfigInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $objectManager = new ObjectManager($this);
        $this->config = $objectManager->getObject(
            Config::class,
            [
                'scopeConfigInterface' => $scopeConfigInterface,
            ]
        );
    }
    public function testGetValue()
    {
        $result = $this->config->getValue('test/value');
        $this->assertSame('', $result);
    }

    public function testIsSetFlag()
    {
        $result = $this->config->isSetFlag('test/flag');
        $this->assertSame(false, $result);
    }
}
