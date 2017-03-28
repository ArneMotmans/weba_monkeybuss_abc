<?php
/**
 * Created by PhpStorm.
 * User: 11501537
 * Date: 28/03/2017
 * Time: 11:11
 */

namespace model\entities;


use Throwable;

class eventException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}