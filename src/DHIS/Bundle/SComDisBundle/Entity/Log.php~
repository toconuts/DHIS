<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Log.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="DHIS\Bundle\SComDisBundle\Entity\LogRepository")
 */
class Log
{
    const LOG_LEVEL_INFO = 1;
    const LOG_LEVEL_WARN = 2;
    const LOG_LEVEL_ERROR = 3;
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $message
     * 
     * @ORM\Column(name="message", type="string", length=50, nullable=false)
     * @Assert\MaxLength(limit=140)
     */
    private $message;
    
    /**
     * @var string $userName
     * 
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     * @Assert\MaxLength(limit=50)
     */
    private $username;
    
    /**
     * @ORM\Column(name="level", type="integer", nullable=false)
     * 
     * @var type 
     */
    private $level;
    
    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;
    
    public function __construct($message, $username, $level)
    {
        $this->message = $message;
        $this->username = $username;
        $this->level = $level;
    }

    public function setId($value)
    {
        $this->id = $value;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setMessage($value)
    {
        $this->message = $value;
    }
    
    public function getMessage()
    {
        return $this->message;
    }

    public function setUsername($value)
    {
        $this->username = $value;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setLevel($value)
    {
        $this->level = $value;
    }
    
    public function getLevel()
    {
        return $this->level;
    }
    
    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}