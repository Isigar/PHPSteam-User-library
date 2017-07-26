<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:05
 */

namespace Relisoft\Steam\Src\Api;


use Nette\Caching\Cache;
use Nette\Caching\Storages\FileStorage;
use Nette\Utils\Json;
use Relisoft\Steam\Src\Easy;
use Relisoft\Steam\Src\IsNot;
use Tracy\Dumper;

class Request
{
    private $key = "2C517FA68EA88AC05B49140A9C06FA24";

    /**
     * @var Cache $cache
     */
    private $cache;

    public function __construct()
    {
        $storage = new FileStorage(__DIR__."/../../temp/");
        $cache = new Cache($storage);
        $this->cache = $cache;
    }

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
                    return $player;
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
                    return $player;
                }
            }
            else
            {
                throw new ApiException("Wrong format! ");
            }
        }
    }

    /**
     * @param Player $player
     * @param int $limit
     * @return Player
     * @throws ApiException
     */
    public function getPlayerRecentlyPlayedGames(Player $player, $limit = 10)
    {
        if(is_null($player->getSteamid()))
        {
            throw new ApiException("Player has no steam ID!");
        }
        else
        {
            $url = 'http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key='.$this->key.'&steamid='.$player->getSteamid()."&format=json";
            $data = file_get_contents($url);
            $clone = $data;

            if(Easy::isJson($data))
            {
                $total_count = Json::decode($clone)->response->total_count;

                if($total_count != 0)
                {
                    $data = Json::decode($data)->response->games;
                }
                else
                {
                    $data = null;
                }

                $games = new Games();
                $games->setGames($data);
                $games->setTotalCount($total_count);
                $player->setGames($games);
                return $player;
            }
            else
            {
                throw new ApiException("Wrong format! ");
            }
        }
    }

    public function getPlayerInventory(Player $player,$game = Games::CSGO)
    {
        if(is_null($player->getProfileurl()))
        {
            throw new ApiException("Player has no profile url!");
        }
        else
        {
            $url = $player->getProfileurl()."/inventory/json/".$game."/2";
            $data = file_get_contents($url);

            if(Easy::isJson($data))
            {
                $decode = Json::decode($data);
                $items = $decode->rgInventory;
                $descriptions = $decode->rgDescriptions;
                $success = $decode->success;

                $inventory = new Inventory($items,$descriptions,count($items),$success);
                $inventory->pairItems();
                $player->setInventory($inventory);
                return $player;
            }
            else
            {
                throw new ApiException("Wrong format! ");
            }
        }
    }

    public function getFullData(Player $player)
    {
        $player = $this->cache->call([$this,'getPlayerSummaries'],$player);
        $player = $this->cache->call([$this,'getPlayerFriends'],$player);
        $player = $this->cache->call([$this,'getPlayerRecentlyPlayedGames'],$player);
        $player = $this->cache->call([$this,'getPlayerInventory'],$player);
        return $player;
    }

    public function saveRequest(Player $player)
    {


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