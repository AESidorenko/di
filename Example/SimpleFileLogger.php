<?php

namespace App\Example;

class SimpleFileLogger implements LoggerInterface
{
    private const LOG_FILENAME = 'log.txt';

    private string $logDir;

    /**
     * SimpleFileLogger constructor.
     * @param string $logFilename
     */
    public function __construct()
    {
        $this->logDir = __DIR__ . '/../log';
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir);
        }

        if (!is_writable($this->logDir)) {
            throw new \RuntimeException('Logs directory is not writable: %s', $this->logDir);
        }

        $result = touch($this->logDir . '/' . self::LOG_FILENAME);
        if ($result === false) {
            throw new \RuntimeException('Can\'t create log file: %s', $this->logDir . '/' . self::LOG_FILENAME);
        }
    }

    public function log(string $message, array $context = [])
    {
        $this->writeLog('LOG', $message, $context);
    }

    public function error(string $message, array $context = [])
    {
        $this->writeLog('ERROR', $message, $context);
    }

    private function writeLog(string $prefix, string $message, array $context)
    {
        $file = fopen($this->logDir . '/' . self::LOG_FILENAME, 'a');
        if ($file === false) {
            throw new \RuntimeException('Can\'t write to log file: %s', $this->logDir . '/' . self::LOG_FILENAME);
        }

        $contextString = empty($context) ? '' : print_r($context, true);
        fputs($file, sprintf('%s [%s] %s. %s' . PHP_EOL, date(DATE_ATOM), $prefix, $message, $contextString));

        fclose($file);
    }
}