<?php
namespace Relisoft\Steam\Src;


use Nette\Object;

class Easy extends Object
{
    public static function isJson($data)
    {
        if(is_array($data)) {
            return false;
        }
        if(is_int($data)){
            return false;
        }

        $failed = false;
        try{
            \Nette\Utils\Json::decode($data);
        }catch(\Exception $e){
            $failed = true;
        }

        if($failed)
            return false;
        else
            return true;
    }
}