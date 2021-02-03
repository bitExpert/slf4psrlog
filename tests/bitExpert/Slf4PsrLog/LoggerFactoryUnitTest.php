<?php

/*
 * This file is part of the Simple Logging Facade for PSR-3 Loggers package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\Slf4PsrLog;

use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Unit test for {@link \bitExpert\Slf4PsrLog\LoggerFactory}.
 *
 * @covers \bitExpert\Slf4PsrLog\LoggerFactory
 */
class LoggerFactoryUnitTest extends TestCase
{
    /**
     * @test
     */
    public function returnsNullLoggerWhenCallingWithoutConfiguredCallback()
    {
        $logger = LoggerFactory::getLogger('channel');

        $this->assertInstanceOf(NullLogger::class, $logger);
    }

    /**
     * @test
     */
    public function throwsRuntimeExceptionWhenCallableDoesNotReturnLoggerInstance()
    {
        $this->expectException(\RuntimeException::class);

        LoggerFactory::registerFactoryCallback(function($channel) {
            return null;
        });

        LoggerFactory::getLogger('channel');
    }

    /**
     * @test
     */
    public function getLoggerCallIsDelegatedToCallable()
    {
        $loggerMock = $this->createMock(LoggerInterface::class);
        LoggerFactory::registerFactoryCallback(function($channel) use ($loggerMock) {
           return $loggerMock;
        });

        $logger = LoggerFactory::getLogger('test');

        $this->assertSame($loggerMock, $logger);
    }

    /**
     * @test
     */
    public function channelParamIsPassedToCallable()
    {
        $loggerMock = $this->createMock(LoggerInterface::class);
        LoggerFactory::registerFactoryCallback(function($channel) use ($loggerMock) {
            $loggerMock->channel = $channel;
            return $loggerMock;
        });

        $logger = LoggerFactory::getLogger('test');

        $this->assertSame('test', $logger->channel);
    }
}
