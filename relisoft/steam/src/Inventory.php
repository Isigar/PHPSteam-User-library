<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 24.7.2017
 * Time: 14:59
 */

namespace Relisoft\Steam\Src\Api;


use Relisoft\Steam\Src\IsNot;

class Inventory
{
    private $items;
    private $description;
    private $count;
    private $success;
    private $data;

    public function __construct($items,$description,$count,$success)
    {
        $this->setCount($count);
        $this->setDescription($description);
        $this->setItems($items);
        $this->setSuccess($success);
    }

    public function pairItems()
    {
        if($this->getSuccess())
        {
            $items = [];
            foreach($this->items as $item)
            {
                $f = new Item($item->id);
                $f->setAmount($item->amount);
                $f->setPos($item->pos);
                $f->setClassid($item->classid);
                $f->setInstanceid($item->instanceid);
                $d = new ItemDescription();

                $fetch = $item->classid."_".$item->instanceid;
                $des = new IsNot($this->getDescription()->$fetch);

                $d->setAppid($des->appid);
                $d->setClassid($des->classid);
                $d->setInstanceid($des->instanceid);
                $d->setIconUrl($des->icon_url);
                $d->setIconUrlLarge($des->icon_url_large);
                $d->setIconDragUrl($des->icon_drag_url);
                $d->setName($des->name);
                $d->setMarketHashName($des->market_hash_name);
                $d->setMarketName($des->market_name);
                $d->setNameColor($des->name_color);
                $d->setBackgroundColor($des->background_color);
                $d->setType($des->type);
                $d->setTradable($des->tradable);
                $d->setMarketable($des->marketable);
                $d->setCommodity($des->commodity);
                $d->setMarketTradableRestriction($des->market_tradable_restriction);
                $d->setActions($des->actions);
                $d->setMarketActions($des->market_actions);
                $d->setTags($des->tags);
                $d->setAppid($des->appid);
                $f->setDescription($d);
                $items[$item->id] = $f;
            }
            $this->data = $items;

        }
        else
        {
            throw new ApiException("Inventory load failed!");
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return Inventory
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     * @return Inventory
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Inventory
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     * @return Inventory
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     * @return Inventory
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }



}