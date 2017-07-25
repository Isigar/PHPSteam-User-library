<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:06
 */

namespace Relisoft\Steam\Src\Api;


class Games
{
    const TF2 = "440";
    const CSGO = "730";

    private $games;
    private $totalCount;

    public function getGame($appid)
    {
        $iterator = 0;
        foreach($this->getGames() as $game)
        {
            if($game->appid = $appid)
            {
                return $iterator;
            }
            $iterator++;
        }
    }

    /**
     * @return mixed
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param mixed $games
     * @return Games
     */
    public function setGames($games)
    {
        if($games instanceof \stdClass)
        {
            $fullClasses = [];
            foreach($games as $game)
            {
                $f = new Game($game->appid);
                $f->setImgIconUrl($game->img_icon_url);
                $f->setImgLogoUrl($game->img_logo_url);
                $f->setName($game->name);
                $f->setPlaytime2weeks($game->playtime_2weeks);
                $f->setPlaytimeForever($game->playtime_forever);
                $fullClasses[$game->appid] = $f;

            }
        }
        else
        {
            $this->games = $games;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param mixed $totalCount
     * @return Games
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
        return $this;
    }


}