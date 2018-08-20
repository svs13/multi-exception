<?php
namespace Svs13;

/**
 * Class MultiException
 * @package App
 */
class MultiException extends \Exception
{
    /**
     * @var \Exception[]
     */
    protected $errors = [];

    /**
     * @param \Exception $exception
     */
    public function add(\Exception $exception)
    {
        $this->errors[] = $exception;
    }

    /**
     * @return bool
     */
    public function empty()
    {
        return empty($this->errors);
    }

    /**
     * @return \Exception[]
     */
    public function getAll()
    {
        return $this->errors;
    }
}

