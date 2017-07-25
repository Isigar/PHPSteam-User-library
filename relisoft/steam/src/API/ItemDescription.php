<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 25.7.2017
 * Time: 11:44
 */

namespace Relisoft\Steam\Src\Api;


class ItemDescription
{
    private $appid;
    private $classid;
    private $instanceid;
    private $icon_url;
    private $icon_url_large;
    private $icon_drag_url;
    private $name;
    private $market_hash_name;
    private $market_name;
    private $name_color;
    private $background_color;
    private $type;
    private $tradable;
    private $marketable;
    private $commodity;
    private $market_tradable_restriction;
    private $actions;
    private $market_actions;
    private $tags;

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     * @return ItemDescription
     */
    public function setAppid($appid)
    {
        $this->appid = $appid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClassid()
    {
        return $this->classid;
    }

    /**
     * @param mixed $classid
     * @return ItemDescription
     */
    public function setClassid($classid)
    {
        $this->classid = $classid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstanceid()
    {
        return $this->instanceid;
    }

    /**
     * @param mixed $instanceid
     * @return ItemDescription
     */
    public function setInstanceid($instanceid)
    {
        $this->instanceid = $instanceid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIconUrl()
    {
        return $this->icon_url;
    }

    /**
     * @param mixed $icon_url
     * @return ItemDescription
     */
    public function setIconUrl($icon_url)
    {
        $this->icon_url = $icon_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIconUrlLarge()
    {
        return $this->icon_url_large;
    }

    /**
     * @param mixed $icon_url_large
     * @return ItemDescription
     */
    public function setIconUrlLarge($icon_url_large)
    {
        $this->icon_url_large = $icon_url_large;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIconDragUrl()
    {
        return $this->icon_drag_url;
    }

    /**
     * @param mixed $icon_drag_url
     * @return ItemDescription
     */
    public function setIconDragUrl($icon_drag_url)
    {
        $this->icon_drag_url = $icon_drag_url;
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
     * @return ItemDescription
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketHashName()
    {
        return $this->market_hash_name;
    }

    /**
     * @param mixed $market_hash_name
     * @return ItemDescription
     */
    public function setMarketHashName($market_hash_name)
    {
        $this->market_hash_name = $market_hash_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketName()
    {
        return $this->market_name;
    }

    /**
     * @param mixed $market_name
     * @return ItemDescription
     */
    public function setMarketName($market_name)
    {
        $this->market_name = $market_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameColor()
    {
        return $this->name_color;
    }

    /**
     * @param mixed $name_color
     * @return ItemDescription
     */
    public function setNameColor($name_color)
    {
        $this->name_color = $name_color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }

    /**
     * @param mixed $background_color
     * @return ItemDescription
     */
    public function setBackgroundColor($background_color)
    {
        $this->background_color = $background_color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return ItemDescription
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTradable()
    {
        return $this->tradable;
    }

    /**
     * @param mixed $tradable
     * @return ItemDescription
     */
    public function setTradable($tradable)
    {
        $this->tradable = $tradable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketable()
    {
        return $this->marketable;
    }

    /**
     * @param mixed $marketable
     * @return ItemDescription
     */
    public function setMarketable($marketable)
    {
        $this->marketable = $marketable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommodity()
    {
        return $this->commodity;
    }

    /**
     * @param mixed $commodity
     * @return ItemDescription
     */
    public function setCommodity($commodity)
    {
        $this->commodity = $commodity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketTradableRestriction()
    {
        return $this->market_tradable_restriction;
    }

    /**
     * @param mixed $market_tradable_restriction
     * @return ItemDescription
     */
    public function setMarketTradableRestriction($market_tradable_restriction)
    {
        $this->market_tradable_restriction = $market_tradable_restriction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param mixed $actions
     * @return ItemDescription
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketActions()
    {
        return $this->market_actions;
    }

    /**
     * @param mixed $market_actions
     * @return ItemDescription
     */
    public function setMarketActions($market_actions)
    {
        $this->market_actions = $market_actions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     * @return ItemDescription
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }


}