<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:01
 */

namespace Relisoft\Steam\Src;


class Json extends \stdClass
{
    private $data;

    public function __construct($key,$data)
    {
        if(Easy::isJson($data))
        {
            $this->data[$key] = \Nette\Utils\Json::decode($data);
        }
        else
        {
            $this->data[$key] = $data;
        }
    }
}