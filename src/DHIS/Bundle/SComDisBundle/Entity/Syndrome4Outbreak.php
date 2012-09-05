<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Syndrome for outbreak dailly tally.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="syndrome_outbreak")
 * @ORM\Entity()
 */
class Syndrome4Outbreak
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string $name
     * 
     * @ORM\Column(name="name", type="string", length=100, unique=true)
     * @Assert\MaxLength(limit=100)
     */
    private $name;
    
    /**
     * @var integer $display_id
     * 
     * @ORM\Column(name="display_id", type="integer", unique=true)
     */
    private $display_id;

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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set display_id
     *
     * @param integer $displayId
     */
    public function setDisplayId($displayId)
    {
        $this->display_id = $displayId;
    }

    /**
     * Get display_id
     *
     * @return integer 
     */
    public function getDisplayId()
    {
        return $this->display_id;
    }

    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}