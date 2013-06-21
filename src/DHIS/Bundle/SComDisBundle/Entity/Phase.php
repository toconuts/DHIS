<?php

namespace DHIS\Bundle\SComDisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Phase.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 * 
 * @ORM\Table(name="phase")
 * @ORM\Entity()
 */
class Phase
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;
    
    /**
     * @var float $threshold
     * 
     * @ORM\Column(name="threshold", type="float") 
     * @Assert\NotBlank
     */
    private $threshold;
    
    /**
     * @var string $color
     * 
     * @ORM\Column(name="referrals", type="string", length=50)
     * @Assert\MaxLength(limit=50)
     * @Assert\NotBlank
     */
    private $color;
    
    public function __construct()
    {
        
    }

    public function setId($value) {
        $this->id = $value;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setThreshold($value) {
        $this->threshold = $value;
    }
    
    public function getThreshold() {
        return $this->threshold;
    }
    
    public function setColor($value) {
        $this->color = $value;
    }
    
    public function getColor() {
        return $this->color;
    }
    
}