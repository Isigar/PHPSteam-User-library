<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:05
 */

namespace Relisoft\Steam\Src\Api;


use Nette\Utils\Json;
use Relisoft\Steam\Src\Easy;
use Relisoft\Steam\Src\IsNot;
use Tracy\Dumper;

class Request
{
    private $key = "2C517FA68EA88AC05B49140A9C06FA24";
    private $lastRequest;

    public function getPlayerSummaries(Player $player)
    {
        if(is_null($player->getSteamid()))
        {
            throw new ApiException("Player has no steam ID!");
        }
        else
        {
            $url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$this->key.'&steamids='.$player->getSteamid();
            $data = file_get_contents($url);
            if(Easy::isJson($data))
            {
                $data = Json::decode($data)->response->players;
                if(!isset($data[0]))
                {
                    throw new ApiException("Player not exists! ".$player->getSteamid());
                }
                else
                {
                    $play = $data[0];
                    $playdata = new IsNot($play);

                    $player->setAvatar($playdata->avatar);
                    $player->setAvatarfull($playdata->avatarfull);
                    $player->setAvatarmedium($playdata->avatarmedium);
                    $player->setPersonaname($playdata->personaname);
                    $player->setPersonastate($playdata->personastate);
                    $player->setLastlogof($playdata->lastlogoff);
                    $player->setComment($playdata->commentpermission);
                    $player->setProfilestate($playdata->profilestate);
                    $player->setProfileurl($playdata->profileurl);
                    $player->setState($playdata->personastate);
                    return $this;
                }
            }
            else
            {
                throw new ApiException("Wrong format! ");
            }
        }
    }

    public function getPlayerFriends(Player $player,$limit = 10)
    {
        if(is_null($player->getSteamid()))
        {
            throw new ApiException("Player has no steam ID!");
        }
        else
        {
            $url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key='.$this->key.'&steamid='.$player->getSteamid()."&relationship=friend";
            $data = file_get_contents($url);

            if(Easy::isJson($data))
            {
                $data = Json::decode($data)->friendslist->friends;

                if(!isset($data))
                {
                    throw new ApiException("Player not exists! ".$player->getSteamid());
                }
                else
                {
                    $limit = array_slice((array)$data,0,$limit);

                    $friends = new Friends();
                    $friends->setFriends($data);
                    $player->setFriends((object)$limit);
                    return $this;
                }
            }
            else
            {
                throw new ApiException("Wrong format! ");
            }
        }
    }


    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return Request
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }


}