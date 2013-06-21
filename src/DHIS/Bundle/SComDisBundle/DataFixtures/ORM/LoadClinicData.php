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
        $marigot = $this->createClinic(1001, 'MARIGOT', 'M.01', $this->getReference('MARIGOT'), $this->getReference('DIST_MARIGOT'));
        $atkinson = $this->createClinic(1002, 'ATKINSON', 'M.02', $this->getReference('MARIGOT'), $this->getReference('DIST_MARIGOT'));
        $wesley = $this->createClinic(1003, 'WESLEY', 'M.03', $this->getReference('MARIGOT'), $this->getReference('DIST_MARIGOT'));
        $woodfordhill = $this->createClinic(1004, 'WOODFORD HILL', 'M.04', $this->getReference('MARIGOT'), $this->getReference('DIST_MARIGOT'));
        $calibshie = $this->createClinic(1005, 'CALIBSHIE', 'M.05', $this->getReference('MARIGOT'), $this->getReference('DIST_MARIGOT'));
        
        /* GRAND BAY */
        $grandbay = $this->createClinic(2001, 'GRAND BAY', 'G.01', $this->getReference('GRANDBAY'), $this->getReference('DIST_GRANDBAY'));
        $petitesavanne = $this->createClinic(2002, 'PETITE SAVANNE', 'G.02', $this->getReference('GRANDBAY'), $this->getReference('DIST_GRANDBAY'));
        $bagatelle = $this->createClinic(2003, 'BAGATELLE', 'G.03', $this->getReference('GRANDBAY'), $this->getReference('DIST_GRANDBAY'));
        $pichelin = $this->createClinic(2004, 'PICHELIN', 'G.04', $this->getReference('GRANDBAY'), $this->getReference('DIST_GRANDBAY'));
        $tetemorne = $this->createClinic(2005, 'TETE MORNE', 'G.05', $this->getReference('GRANDBAY'), $this->getReference('DIST_GRANDBAY'));
        
        /* ST JOSEPH */
        $stjoseph = $this->createClinic(3001, 'ST JOSEPH', 'J.01', $this->getReference('STJOSEPH'), $this->getReference('DIST_STJOSEPH'));
        $salisbury = $this->createClinic(3002, 'SALISBURY', 'J.02', $this->getReference('STJOSEPH'), $this->getReference('DIST_STJOSEPH'));
        $coulibstrie = $this->createClinic(3003, 'COULIBSTRIE', 'J.03', $this->getReference('STJOSEPH'), $this->getReference('DIST_STJOSEPH'));
        $colihaut = $this->createClinic(3004, 'COLIHAUT', 'J.04', $this->getReference('STJOSEPH'), $this->getReference('DIST_STJOSEPH'));
        $belles = $this->createClinic(3005, 'BELLES', 'J.05', $this->getReference('STJOSEPH'), $this->getReference('DIST_STJOSEPH'));
        
        /* LA PLAINE */
        $laplaine = $this->createClinic(4001, 'LA PLAINE', 'L.01', $this->getReference('LAPLAINE'), $this->getReference('DIST_LAPLAINE'));
        $rivierecyrique = $this->createClinic(4002, 'RIVIERE CYRIQUE', 'L.02', $this->getReference('LAPLAINE'), $this->getReference('DIST_LAPLAINE'));
        $grandfond = $this->createClinic(4003, 'GRAND FOND', 'L.03', $this->getReference('LAPLAINE'), $this->getReference('DIST_LAPLAINE'));
        $boetica = $this->createClinic(4004, 'BOETICA', 'L.04', $this->getReference('LAPLAINE'), $this->getReference('DIST_LAPLAINE'));
        $delices = $this->createClinic(4005, 'DELICES', 'L.05', $this->getReference('LAPLAINE'), $this->getReference('DIST_LAPLAINE'));
        
        /* CASTLE BRUCE */
        $castlebruce = $this->createClinic(5001, 'CASTLE BRUCE', 'C.01', $this->getReference('CASTLEBRUCE'), $this->getReference('DIST_CASTLEBRUCE'));
        $goodhope = $this->createClinic(5002, 'GOOD HOPE', 'C.02', $this->getReference('CASTLEBRUCE'), $this->getReference('DIST_CASTLEBRUCE'));
        $petitesoufriere = $this->createClinic(5003, 'PETITE SOUFRIERE', 'C.03', $this->getReference('CASTLEBRUCE'), $this->getReference('DIST_CASTLEBRUCE'));
        $salybia = $this->createClinic(5004, 'SALYBIA', 'C.04', $this->getReference('CASTLEBRUCE'), $this->getReference('DIST_CASTLEBRUCE'));
        $gauletteriver = $this->createClinic(5005, 'GAULETTE RIVER', 'C.05', $this->getReference('CASTLEBRUCE'), $this->getReference('DIST_CASTLEBRUCE'));
        
        /* PORTSMOUTH */
        $portsmouth = $this->createClinic(6001, 'PORTSMOUTH', 'P.01', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $clifton = $this->createClinic(6002, 'CLIFTON', 'P.02', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $dosdane = $this->createClinic(6003, "DOS D''ANE", 'P.03', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $ansedemai = $this->createClinic(6004, "ANSE DE MAI", 'P.04', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $thibaud = $this->createClinic(6005, "THIBAUD", 'P.05', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $viellecase = $this->createClinic(6006, "VIELLE CASE", 'P.06', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $penville = $this->createClinic(6007, "PENVILLE", 'P.07', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
        $dublanc = $this->createClinic(6008, "DUBLANC", 'P.08', $this->getReference('PORTSMOUTH'), $this->getReference('DIST_PORTSMOUTH'));
       
        /* ROSEAU */
        /* ROSEAU CENTRAL */
        $roseau = $this->createClinic(7101, "ROSEAU", 'R.C1', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        /* ROSEAU NORTH */
        $goodwill = $this->createClinic(7201, "GOODWILL", 'R.N1', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $fondcole = $this->createClinic(7202, "FONDCOLE", 'R.N2', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $massacre = $this->createClinic(7203, "MASSACRE", 'R.N3', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $cockrane = $this->createClinic(7204, "COCKRANE", 'R.N4', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $mahaut = $this->createClinic(7205, "MAHAUT", 'R.N5', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $campbell = $this->createClinic(7206, "CAMPBELL", 'R.N6', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $Warner = $this->createClinic(7207, "WARNER", 'R.N7', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        /* ROSEAU SOUTH */
        $newtown = $this->createClinic(7301, "NEWTOWN", 'R.S1', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $pointmichel = $this->createClinic(7302, "POINTE MICHEL", 'R.S2', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $soufriere = $this->createClinic(7303, "SOUFRIERE", 'R.S3', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $scottshead = $this->createClinic(7304, "SCOTTS HEAD", 'R.S4', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        /* ROSEAU VALLEY */
        $bellevuechopin = $this->createClinic(7401, "BELLEVUE CHOPIN", 'R.V1', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $giraudel = $this->createClinic(7402, "GIRAUDEL", 'R.V2', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $eggleston = $this->createClinic(7403, "EGGLESTON", 'R.V3', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $morneprosper = $this->createClinic(7404, "MORNE PROSPER", 'R.V4', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $laudat = $this->createClinic(7405, "LAUDAT", 'R.V5', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $trafalgar = $this->createClinic(7406, "TRAFALGAR", 'R.V6', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        $wottonwaven = $this->createClinic(7407, "WOTTON WAVEN", 'R.V7', $this->getReference('ROSEAU'), $this->getReference('DIST_ROSEAU'));
        
        /* PMH */
        // A&E@PMH
        $ane = $this->createClinic(8002, 'A&E', '2', $this->getReference('PMH'), $this->getReference('DIST_ROSEAU'));
        $imrayward = $this->createClinic(8003, 'IMRAY WARD', '3', $this->getReference('PMH'), $this->getReference('DIST_ROSEAU'));
        $gloverward = $this->createClinic(8004, 'GLOVER WARD', '4', $this->getReference('PMH'), $this->getReference('DIST_ROSEAU'));
        $winstonward = $this->createClinic(8005, 'WINSTON WARD', '5', $this->getReference('PMH'), $this->getReference('DIST_ROSEAU'));
        
        /* ROSS UNIVERSITY */
        $dublanc = $this->createClinic(9001, "ROSS UNIVERSITY", 'P.09', $this->getReference('ROSSUNIVERSITY'), $this->getReference('DIST_PORTSMOUTH'));
        
        $this->manager->flush();
        
        $this->addReference('A&E@PMH', $ane);
        $this->addReference('IMRAY WARD@PMH', $imrayward);
        $this->addReference('GLOVER WARD@PMH', $gloverward);
        $this->addReference('WINSTON WARD@PMH', $winstonward);
        
        $this->addReference('PORTSMOUTH@PORTSMOUTH',    $portsmouth);
        $this->addReference('CLIFTON@PORTSMOUTH',       $clifton);
        $this->addReference('DOSDANE@PORTSMOUTH',       $dosdane);
        
    }
    
    protected function createClinic($id, $name, $code, $sentinel, $district) {
        $clinic = new Clinic();
        $clinic->setId($id);
        $clinic->setName($name);
        $clinic->setCode($code);
        $clinic->setSentinelSite($sentinel);
        $clinic->setDistrict($district);
        $this->manager->persist($clinic);
        return $clinic;
    }
    
    /**
     * @InheritDoc
     */
    public function getOrder()
    {
        return 3;
    }
}
