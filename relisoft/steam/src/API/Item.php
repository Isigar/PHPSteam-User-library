<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 25.7.2017
 * Time: 11:44
 */

namespace Relisoft\Steam\Src\Api;


class Item
{
    private $id;
    private $classid;
    private $instanceid;
    private $amount;
    private $pos;
    private $description;

    public function __construct($id)
    {
        $this->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Item
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Item
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
     * @return Item
     */
    public function setInstanceid($instanceid)
    {
        $this->instanceid = $instanceid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     * @return Item
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @param mixed $pos
     * @return Item
     */
    public function setPos($pos)
    {
        $this->pos = $pos;
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
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }





}