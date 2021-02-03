<?php

/*
 * This file is part of the Simple Logging Facade for PSR-3 Loggers package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace bitExpert\Slf4PsrLog;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RuntimeException;

/**
 * Factory implementation to configure and return {@link \Psr\Log\LoggerInterface} instances.
 *
 * @api
 */
class LoggerFactory
{
    /**
     * @var callable
     */
    private static $callback = null;

    /**
     * Registers a callable as delegate to create a logger instance when calling
     * the getLogger() method.
     *
     * @param callable $callback
     */
    public static function registerFactoryCallback(callable $callback): void
    {
        self::$callback = $callback;
    }

    /**
     * Returns a configured logger instance for the given $channel. If no FactoryCallback
     * is registered it will return an instance of {@link \Psr\Log\NullLogger}.
     *
     * @param string $channel
     * @return LoggerInterface
     * @throws RuntimeException
     */
    public static function getLogger(string $channel): LoggerInterface
    {
        $callback = self::$callback;
        if (!is_callable($callback)) {
            return new NullLogger();
        }

        $logger = $callback($channel);
        if ($logger instanceof LoggerInterface) {
            return $logger;
        }

        throw new RuntimeException('Callback did not return an instance of \Psr\Log\LoggerInterface!');
    }
}
