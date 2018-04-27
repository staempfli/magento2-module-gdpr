<?php
/**
 * Copyright © 2018 Stämpfli AG. All rights reserved.
 * @author marcel.hauri@staempfli.com
 */

namespace Staempfli\Gdpr\Test\Unit\Block;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Staempfli\Gdpr\Model\Config;

abstract class AbstractBlockSetup extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;
    /**
     * @var \Magento\Framework\View\Element\Template\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $context;
    /**
     * @var \Staempfli\Gdpr\Model\Config|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $config;

    public function setUp()
    {
        $this->objectManager = new ObjectManager($this);
        $this->context = $this->getMockBuilder(\Magento\Framework\View\Element\Template\Context::class)
            ->disableOriginalConstructor()
            ->getMock();
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
}
