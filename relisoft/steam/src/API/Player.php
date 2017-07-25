<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:08
 */

namespace Relisoft\Steam\Src\Api;


use Nette\Utils\DateTime;

/**
 * Class Player
 * @package Relisoft\Steam\Src\Api
 */
class Player
{
    /**
     * @var int $steamid
     */
    private $steamid;
    /**
     * @var string $personaname
     */
    private $personaname;
    /**
     * @var string $profileurl
     */
    private $profileurl;
    /**
     * @var string $avatar
     * URL of image
     */
    private $avatar;
    /**
     * @var string $avatarmedium
     * URL of image
     */
    private $avatarmedium;
    /**
     * @var string $avatarfull
     * URL of image
     */
    private $avatarfull;
    /**
     * @var int $personastate
     */
    private $personastate;
    /**
     * @var int $state
     * 1 private, friend only
     * 3 public
     */
    private $state;
    /**
     * @var int $profilestate
     * if set indicates the user has a community proifle configured
     */
    private $profilestate;
    /**
     * @var DateTime $lastlogof
     * UNIX time
     */
    private $lastlogof;
    /**
     * @var int $comment
     * If set indicates the profile allows public comment
     */
    private $comment;
    /**
     * @var Friends $friends
     */
    private $friends;
    /**
     * @var Games $games
     */
    private $games;
    /**
     * @var Inventory $inventory
     */
    private $inventory;

    /**
     * Player constructor.
     * @param null $steamid
     */
    public function __construct($steamid = null)
    {
        $this->setSteamid($steamid);
    }

    /**
     * @return Inventory
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @param Inventory $inventory
     * @return Player
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSteamid()
    {
        return $this->steamid;
    }

    /**
     * @param mixed $steamid
     * @return Player
     */
    public function setSteamid($steamid)
    {
        $this->steamid = $steamid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPersonaname()
    {
        return $this->personaname;
    }

    /**
     * @param mixed $personaname
     * @return Player
     */
    public function setPersonaname($personaname)
    {
        $this->personaname = $personaname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfileurl()
    {
        return $this->profileurl;
    }

    /**
     * @param mixed $profileurl
     * @return Player
     */
    public function setProfileurl($profileurl)
    {
        $this->profileurl = $profileurl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return Player
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarmedium()
    {
        return $this->avatarmedium;
    }

    /**
     * @param mixed $avatarmedium
     * @return Player
     */
    public function setAvatarmedium($avatarmedium)
    {
        $this->avatarmedium = $avatarmedium;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarfull()
    {
        return $this->avatarfull;
    }

    /**
     * @param mixed $avatarfull
     * @return Player
     */
    public function setAvatarfull($avatarfull)
    {
        $this->avatarfull = $avatarfull;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPersonastate()
    {
        return $this->personastate;
    }

    /**
     * @param mixed $personastate
     * @return Player
     */
    public function setPersonastate($personastate)
    {
        $this->personastate = $personastate;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return Player
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return int
     */
    public function getProfilestate()
    {
        return $this->profilestate;
    }

    /**
     * @param int $profilestate
     * @return Player
     */
    public function setProfilestate($profilestate)
    {
        $this->profilestate = $profilestate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastlogof()
    {
        return $this->lastlogof;
    }

    /**
     * @param DateTime $lastlogof
     * @return Player
     */
    public function setLastlogof($lastlogof)
    {
        $this->lastlogof = $lastlogof;
        return $this;
    }

    /**
     * @return int
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param int $comment
     * @return Player
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return Friends
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * @param Friends $friends
     * @return Player
     */
    public function setFriends($friends)
    {
        $this->friends = $friends;
        return $this;
    }

    /**
     * @return Games
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param Games $games
     * @return Player
     */
    public function setGames($games)
    {
        $this->games = $games;
        return $this;
    }







}