<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 15:44
 */

namespace Relisoft\Steam\Src\Api;


class PersonaState
{
    const OFFLINE = 0;
    const ONLINE = 1;
    const BUSY = 2;
    const AWAY = 3;
    const SNOOZE = 4;
    const LOOKING_TRADE = 5;
    const LOOKING_PLAY = 6;

    public function getVerbState($val)
    {
        switch ($val)
        {
            case self::OFFLINE:{
                return "Offline";
                break;
            }
            case self::ONLINE:{
                return "Online";
                break;
            }
            case self::BUSY:{
                return "Busy";
                break;
            }
            case self::AWAY:{
                return "Away";
                break;
            }
            case self::SNOOZE:{
                return "Snooze";
                break;
            }
            case self::LOOKING_PLAY:{
                return "Looking to trade";
                break;
            }
            case self::LOOKING_TRADE:{
                return "Looking to trade";
                break;
            }

        }
    }
}