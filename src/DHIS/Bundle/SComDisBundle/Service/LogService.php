<?php

namespace DHIS\Bundle\SComDisBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;

use DHIS\Bundle\SComDisBundle\Entity\Log;
use DHIS\Bundle\SComDisBundle\Entity\LogRepository;

/**
 * Log Service.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class LogService
{
    /**
     * @var RegistryInterface $managerRegistry
     */
    private $managerRegistry;
    
    /**
     * Constructor.
     * 
     * @param RegistryInterface $managerRegistry 
     */
    public function __construct(RegistryInterface $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }
        
    protected function log($message, $username, $level)
    {
        $manager = $this->managerRegistry->getEntityManager('scomdis');
        $repository  = $manager->getRepository('DHISSComDisBundle:Log');
        
        $log = new Log($message, $username, $level);
        $repository->saveMessage($log);
    }
    
    public function info($message, $username)
    {
        $this->log($message, $username, Log::LOG_LEVEL_INFO);
    }
    
    public function warn($message, $username)
    {
        $this->log($message, $username, Log::LOG_LEVEL_WARN);
    }
    
    public function error($message, $username)
    {
        $this->log($message, $username, Log::LOG_LEVEL_ERROR);
    }
}
