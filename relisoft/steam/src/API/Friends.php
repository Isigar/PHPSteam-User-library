<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 16:07
 */

namespace Relisoft\Steam\Src\Api;


class Friends
{
    private $friendlist;

    public function setFriends($data)
    {
        foreach($data as $friend)
        {
            $this->friendlist[$friend->steamid] = $friend;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFriendlist()
    {
        return $this->friendlist;
    }



}