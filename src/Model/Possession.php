<?php

namespace Mwyatt\Possession\Model;

class Possession extends \Mwyatt\Core\AbstractModel
{
    protected $id;
    protected $timeCreated;
    protected $name;
    protected $value;
    protected $possessionTypeId;
    protected $imageId;


    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->timeCreated = ($data['timeCreated']);
        $this->setName($data['name']);
        $this->setValue($data['value']);
        $this->setPossessionTypeId($data['possessionTypeId']);
        $this->setImageId($data['imageId']);
        return $this;
    }


    public function setName($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        // $assertionChain->email($value);
        $this->name = $value;
    }


    public function setValue($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        // $assertionChain->maxLength(255);
        $this->value = $value;
    }


    public function setPossessionTypeId($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        // $assertionChain->maxLength(255);
        $this->possessionTypeId = $value;
    }


    public function setImageId($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        // $assertionChain->maxLength(255);
        $this->imageId = $value;
    }
}
