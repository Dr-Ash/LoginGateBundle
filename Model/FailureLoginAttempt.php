<?php

<<<<<<< HEAD
namespace Ash\LoginGateBundle\Model;
=======
namespace Anyx\LoginGateBundle\Model;
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c

abstract class FailureLoginAttempt
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $ip;

    /**
<<<<<<< HEAD
     * @var string
     */
    protected $username;

    /**
=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var array
     */
    protected $data;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
<<<<<<< HEAD


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
=======
>>>>>>> aa5cb8cae974b75f2ca2ed5c254121304f479e4c
}
