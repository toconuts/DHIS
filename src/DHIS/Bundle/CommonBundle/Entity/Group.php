<?php

namespace DHIS\Bundle\CommonBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Implemantation of RoleInterface.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="dhis_groups")
 * @ORM\Entity()
 */
class Group implements RoleInterface 
{
    /**
     * @var integer $id
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    private $id;
    
    /**
     * @var string $name
     * 
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     * @Assert\MaxLength(limit=50)
     */
    private $name;
    
    /**
     * @var string $role
     * 
     * @ORM\Column(name="role", type="string", length=100, unique=true) 
     * @Assert\NotBlank
     * @Assert\MaxLength(limit=100)
     */
    private $role;
    
    /**
     * @var User $users
     * 
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    private $users;
    
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
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }
    
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    public function getUsers()
    {
        return $this->users;
    }
    
    public function setUsers($users)
    {
        $this->users = $users;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add users
     *
     * @param DHIS\Bundle\CommonBundle\Entity\User $users
     */
    public function addUser(\DHIS\Bundle\CommonBundle\Entity\User $user)
    {
        $this->users[] = $user;
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
    
    /**
     * __toString()
     * 
     * @return type 
     */
    public function __toString()
    {
        return (string)$this->name;
    }
}