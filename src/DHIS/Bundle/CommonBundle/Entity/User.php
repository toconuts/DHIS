<?php

namespace DHIS\Bundle\CommonBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User.
 * 
 * @author Natsuki Hara <toconuts@gmail.com>
 *
 * @ORM\Table(name="dhis_users")
 * @ORM\Entity(repositoryClass="DHIS\Bundle\CommonBundle\Entity\UserRepository")
 * 
 */
class User implements AdvancedUserInterface
{

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $username
     *
     * @ORM\Column(name="name", type="string", length=25, unique=true)
     * @Assert\NotBlank
     * @Assert\MaxLength(limit=25)
     */
    private $username;

    /**
     * @var string $salt
     * 
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;
    
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string $isActive
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var datetime $createAt
     *
     * @ORM\Column(name="create_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createAt;

    /**
     * @var datetime $updateAt
     *
     * @ORM\Column(name="update_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updateAt;

    /**
     * @var ArrayCollection
     * 
     * @ORM\ManyToMany(targetEntity="Group", inversedBy="users")
     */
    private $groups;
    
    /**
     * Constructor. 
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->isActive = true;
//        $this->salt = base_convert(sha1(uniquid(mt_rand(), true)), 16, 36);
    }

    /**
     * @inheritDoc 
     */
    public function getRoles()
    {
        return $this->groups->toArray();
    }
    
    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }
    
    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    /**
     * @inheritDoc 
     */
    public function isAccountNonExpired()
    {
        return true;
    }
    
    /**
     * @inheritDoc 
     */
    public function isAccountNonLocked()
    {
        return true;
    }
    
    /**
     * @inheritDoc 
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }
    
    /**
     * @inheritDoc 
     */
    public function isEnabled()
    {
        return $this->isActive;
    }
    
    /**
     * Set raw password.
     * @param type $rawPassword 
     */
    public function setRawPassword($rawPassword)
    {
        $this->rawPassword = $rawPassword;
        $this->password = self::hashPassword($rawPassword);
    }
    
    /**
     * Get raw password.
     * @return string 
     */
    public function getRawPassword()
    {
        return $this->rawPassword;
    }
    
    /**
     * Is given password valid?
     * 
     * @param string $rawPassword
     * @return boolean 
     */
    public function isValidPassword($rawPassword)
    {
        if ($this->password === self::hashPassword($rawPassword)) {
            return true;
        }
        return false;
    }
    
    /**
     * Hash password.
     * @param string $rawPassword
     * @return string
     */
    public static function hashPassword($rawPassword) 
    {
        return sha1($rawPassword . self::PASSWORD_SALT);
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
     * Set name
     *
     * @param string $name
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set tel
     *
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set createAt
     *
     * @param datetime $createAt
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    /**
     * Get createAt
     *
     * @return datetime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param datetime $updateAt
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }

    /**
     * Get updateAt
     *
     * @return datetime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }   
}