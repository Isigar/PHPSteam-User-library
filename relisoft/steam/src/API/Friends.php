<?php
namespace Relisoft\Steam\Src\Api;


class Friends
{
    /**
     * @var
     */
    private $friendlist;

    /**
     * @param $data
     * @return $this
     */
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