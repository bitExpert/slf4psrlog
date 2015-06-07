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

use Psr\Log\LoggerInterface;

/**
 * NullLogger
 *
 * @api
 */
class NullLogger implements LoggerInterface
{
    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = array())
    {
    }


    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function debug($message, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = array())
    {
    }
}
