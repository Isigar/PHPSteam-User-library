<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:59
 */

namespace Relisoft\Steam\Src;


class IsNot extends \stdClass
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        if(isset($this->data->$name))
        {
            return $this->data->$name;
        }
        else
        {
            return null;
        }
    }
}