<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 27.7.2017
 * Time: 10:10
 */

namespace Relisoft\Steam\Src\Login;

use Nette\Caching\Cache;
use Nette\Caching\Storages\FileStorage;
use Nette\Neon\Neon;
use Nette\SmartObject;

class Login
{
    use SmartObject;

    const CANCEL = "cancel";
    const SUCCESS = "success";
    const FAILED = "failed";

    private $user;
    private $state;
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function getConfig()
    {
        $configPath = __DIR__."/config.neon";
        $data = Neon::decode(file_get_contents($configPath));
        return $data;
    }

    public function auth()
    {
        $config = $this->getConfig();

        $openID = new \LightOpenID($config["host"]);

        if(!$openID->mode)
        {
            $openID->identity = $config["identity"];
            header('Location: ' . $openID->authUrl());
        }
        elseif($openID->mode == 'cancel')
        {
            $this->state = self::CANCEL;
            $this->session["state"] = self::CANCEL;
            return self::CANCEL;
        }
        else
        {
            if($openID->validate())
            {
                $ide = $openID->data["openid_identity"];
                $link = 'http://steamcommunity.com/openid/id/';

                $steamID = str_replace($link,'',$ide);
                $this->state = self::SUCCESS;
                $this->session["state"] = self::CANCEL;
                $this->user = $steamID;
                $this->session["user"] = $steamID;
                return $steamID;
            }
            else
            {
                $this->state = self::FAILED;
                $this->session["state"] = self::FAILED;
                return self::FAILED;
            }
        }
    }

    public function isLogged()
    {
        if($this->state == null)
        {
            $this->state = $this->session["state"];
            $this->user = $this->session["user"];
            if($this->user)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($this->state == "success")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function getSteamID()
    {
        return $this->session["user"];
    }

    public function logout()
    {
        unset($this->session["state"]);
        unset($this->session["user"]);
        $this->state = null;
        $this->user = null;
        return true;
    }
}