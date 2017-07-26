<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 25.7.2017
 * Time: 11:19
 */

namespace Relisoft\Steam\Src\Api;


/**
 * Class Game
 * @package Relisoft\Steam\Src\Api
 */
class Game
{
    /**
     * @var
     */
    private $appid;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $playtime_forever;
    /**
     * @var
     */
    private $playtime_2weeks;
    /**
     * @var
     */
    private $img_icon_url;
    /**
     * @var
     */
    private $img_logo_url;

    /**
     * Game constructor.
     * @param null $appid
     */
    public function __construct($appid = null)
    {
        $this->setAppid($appid);
    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     * @return Game
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Game
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaytimeForever()
    {
        return $this->playtime_forever;
    }

    /**
     * @param mixed $playtime_forever
     * @return Game
     */
    public function setPlaytimeForever($playtime_forever)
    {
        $this->playtime_forever = $playtime_forever;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaytime2weeks()
    {
        return $this->playtime_2weeks;
    }

    /**
     * @param mixed $playtime_2weeks
     * @return Game
     */
    public function setPlaytime2weeks($playtime_2weeks)
    {
        $this->playtime_2weeks = $playtime_2weeks;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgIconUrl()
    {
        return $this->img_icon_url;
    }

    /**
     * @param mixed $img_icon_url
     * @return Game
     */
    public function setImgIconUrl($img_icon_url)
    {
        $this->img_icon_url = $img_icon_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgLogoUrl()
    {
        return $this->img_logo_url;
    }

    /**
     * @param mixed $img_logo_url
     * @return Game
     */
    public function setImgLogoUrl($img_logo_url)
    {
        $this->img_logo_url = $img_logo_url;
        return $this;
    }


}