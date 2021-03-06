<?php

namespace Savage\BooBoo\Formatter;

abstract class AbstractFormatter implements FormatterInterface
{

    protected $errorLimit = E_ALL;

    protected function determineSeverityTextValue($severity)
    {

        switch ($severity) {
            case E_ERROR:
            case E_USER_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
                $severity = 'Error';
                break;

            case E_WARNING:
            case E_USER_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
                $severity = 'Warning';
                break;

            case E_NOTICE:
            case E_USER_NOTICE:
                $severity = 'Notice';
                break;

            case E_STRICT:
                $severity = 'Strict Standards';
                break;

            case E_RECOVERABLE_ERROR:
                $severity = 'Catchable Error';
                break;

            case E_DEPRECATED:
            case E_USER_DEPRECATED:
                $severity = 'Deprecated';
                break;

            default:
                throw new \Exception('Invalid severity specified');
        }

        return $severity;
    }

    public function setErrorLimit($limit = E_ALL)
    {
        $this->errorLimit = $limit;
    }

    public function getErrorLimit()
    {
        return $this->errorLimit;
    }
}
