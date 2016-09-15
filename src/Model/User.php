<?php

namespace Mwyatt\Possession\Model;

class User extends \Mwyatt\Core\AbstractModel
{
    protected $id;
    protected $email;
    protected $password;
    protected $timeCreated;


    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->timeCreated = ($data['timeCreated']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        return $this;
    }


    public function setEmail($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        $assertionChain->maxLength(50);
        $assertionChain->email($value);
        $this->email = $value;
    }


    public function setPassword($value)
    {
        $assertionChain = $this->getAssertionChain($value);
        $assertionChain->maxLength(255);
        $this->password = $value;
    }


    public function validatePassword($value)
    {
        return $this->password === crypt($value);
    }


    public function jsonSerialize()
    {
        $this->setPassword(null);
        return $this;
    }
}
