<?php

namespace DHIS\Bundle\SComDisBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DHIS\Bundle\SComDisBundle\Entity\Clinic;

/**
 * LoadClinicData class for Doctrine Fixtures.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LoadClinicData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;
    
    /**
     * @InheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        
        /* MAROGOT */
        $marigot = $this->createClinic(101, 'MARIGOT', $this->getReference('MARIGOT'));
        $atkinson = $this->createClinic(102, 'ATKINSON', $this->getReference('MARIGOT'));
        $wesley = $this->createClinic(103, 'WESLEY', $this->getReference('MARIGOT'));
        $woodfordhill = $this->createClinic(104, 'WOODFORD HILL', $this->getReference('MARIGOT'));
        $calibshie = $this->createClinic(105, 'CALIBSHIE', $this->getReference('MARIGOT'));
        
        /* GRAND BAY */
        $grandbay = $this->createClinic(201, 'GRAND BAY', $this->getReference('GRANDBAY'));
        $petitesavanne = $this->createClinic(202, 'PETITE SAVANNE', $this->getReference('GRANDBAY'));
        $bagatelle = $this->createClinic(203, 'BAGATELLE', $this->getReference('GRANDBAY'));
        $pichelin = $this->createClinic(204, 'PICHELIN', $this->getReference('GRANDBAY'));
        $tetemorne = $this->createClinic(205, 'TETE MORNE', $this->getReference('GRANDBAY'));
        
        /* ST JOSEPH */
        $stjoseph = $this->createClinic(301, 'ST JOSEPH', $this->getReference('STJOSEPH'));
        $salisbury = $this->createClinic(302, 'SALISBURY', $this->getReference('STJOSEPH'));
        $coulibstrie = $this->createClinic(303, 'COULIBSTRIE', $this->getReference('STJOSEPH'));
        $colihaut = $this->createClinic(304, 'COLIHAUT', $this->getReference('STJOSEPH'));
        $belles = $this->createClinic(305, 'BELLES', $this->getReference('STJOSEPH'));
        
        /* LA PLAINE */
        $laplaine = $this->createClinic(401, 'LA PLAINE', $this->getReference('LAPLAINE'));
        $rivierecyrique = $this->createClinic(402, 'RIVIERE CYRIQUE', $this->getReference('LAPLAINE'));
        $grandfond = $this->createClinic(403, 'GRAND FOND', $this->getReference('LAPLAINE'));
        $boetica = $this->createClinic(404, 'BOETICA', $this->getReference('LAPLAINE'));
        $delices = $this->createClinic(405, 'DELICES', $this->getReference('LAPLAINE'));
        
        /* CASTLE BRUCE */
        $castlebruce = $this->createClinic(501, 'CASTLE BRUCE', $this->getReference('CASTLEBRUCE'));
        $goodhope = $this->createClinic(502, 'GOOD HOPE', $this->getReference('CASTLEBRUCE'));
        $petitesoufriere = $this->createClinic(503, 'PETITE SOUFRIERE', $this->getReference('CASTLEBRUCE'));
        $salybia = $this->createClinic(504, 'SALYBIA', $this->getReference('CASTLEBRUCE'));
        $gauletteriver = $this->createClinic(505, 'GAULETTE RIVER', $this->getReference('CASTLEBRUCE'));
        
        /* PORTSMOUTH */
        // PORTSMOUTH@PORTSMOUTH
        $portsmouth = $this->createClinic(601, 'PORTSMOUTH', $this->getReference('PORTSMOUTH'));
        // CRIFTON@PORTSMOUTH
        $clifton = $this->createClinic(602, 'CLIFTON', $this->getReference('PORTSMOUTH'));
        // DOSDANE@PORTSMOUTH
        $dosdane = $this->createClinic(603, "DOS D''ANE", $this->getReference('PORTSMOUTH'));
        $ansedemai = $this->createClinic(604, "ANSE DE MAI", $this->getReference('PORTSMOUTH'));
        $thibaud = $this->createClinic(605, "THIBAUD", $this->getReference('PORTSMOUTH'));
        $viellecase = $this->createClinic(606, "VIELLE CASE", $this->getReference('PORTSMOUTH'));
        $penville = $this->createClinic(607, "PENVILLE", $this->getReference('PORTSMOUTH'));
        $dublanc = $this->createClinic(608, "DUBLANC", $this->getReference('PORTSMOUTH'));
       
        /* ROSEAU */
        $roseau = $this->createClinic(701, "ROSEAU", $this->getReference('ROSEAU'));
        $goodwill = $this->createClinic(702, "GOODWILL", $this->getReference('ROSEAU'));
        $fondcole = $this->createClinic(703, "FONDCOLE", $this->getReference('ROSEAU'));
        $massacre = $this->createClinic(704, "MASSACRE", $this->getReference('ROSEAU'));
        $cockrane = $this->createClinic(705, "COCKRANE", $this->getReference('ROSEAU'));
        $mahaut = $this->createClinic(706, "MAHAUT", $this->getReference('ROSEAU'));
        $newtown = $this->createClinic(707, "NEWTOWN", $this->getReference('ROSEAU'));
        $pointmichel = $this->createClinic(708, "POINTE MICHEL", $this->getReference('ROSEAU'));
        $soufriere = $this->createClinic(709, "SOUFRIERE", $this->getReference('ROSEAU'));
        $scottshead = $this->createClinic(710, "SCOTTS HEAD", $this->getReference('ROSEAU'));
        $bellevuechopin = $this->createClinic(711, "BELLEVUE CHOPIN", $this->getReference('ROSEAU'));
        $giraudel = $this->createClinic(712, "GIRAUDEL", $this->getReference('ROSEAU'));
        $eggleston = $this->createClinic(713, "EGGLESTON", $this->getReference('ROSEAU'));
        $morneprosper = $this->createClinic(714, "MORNE PROSPER", $this->getReference('ROSEAU'));
        $laudat = $this->createClinic(715, "LAUDAT", $this->getReference('ROSEAU'));
        $trafalgar = $this->createClinic(716, "TRAFALGAR", $this->getReference('ROSEAU'));
        $wottonwaven = $this->createClinic(717, "WOTTON WAVEN", $this->getReference('ROSEAU'));
        
        /* PMH */
        // A&E@PMH
        $ane = $this->createClinic(802, 'A&E', $this->getReference('PMH'));
        $imrayward = $this->createClinic(803, 'IMRAY WARD', $this->getReference('PMH'));
        $gloverward = $this->createClinic(804, 'GLOVER WARD', $this->getReference('PMH'));
        $winstonward = $this->createClinic(805, 'WINSTON WARD', $this->getReference('PMH'));
        
        /* ROSS UNIVERSITY */
        $dublanc = $this->createClinic(901, "ROSS UNIVERSITY", $this->getReference('ROSSUNIVERSITY'));
        
        $this->manager->flush();
        
        $this->addReference('A&E@PMH', $ane);
        $this->addReference('PORTSMOUTH@PORTSMOUTH',    $portsmouth);
        $this->addReference('CLIFTON@PORTSMOUTH',       $clifton);
        $this->addReference('DOSDANE@PORTSMOUTH',       $dosdane);
        
    }
    
    protected function createClinic($id, $name, $sentinel) {
        $clinic = new Clinic();
        $clinic->setId($id);
        $clinic->setName($name);
        $clinic->setSentinelSite($sentinel);
        $this->manager->persist($clinic);
        return $clinic;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 2;
    }
}
