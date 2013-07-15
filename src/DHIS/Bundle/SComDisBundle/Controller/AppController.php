<?php

namespace DHIS\Bundle\SComDisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

use DHIS\Bundle\SComDisBundle\Entity\Log;

/**
 * AppController
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
abstract class AppController extends Controller
{
    public function logInfo($message)
    {
        $this->log($message, Log::LOG_LEVEL_INFO);
    }
    
    public function logError($message)
    {
        $this->log($message, Log::LOG_LEVEL_ERROR);
    }
    
    public function logWarn($message)
    {
        $this->log($message, Log::LOG_LEVEL_WARN);
    }

    public function log($message, $level)
    {
        $securityContext = $this->get('security.context');
        $user = $securityContext->getToken()->getUser();
        
        $service = $this->get('log_service');
        
        switch ($level) {
            case Log::LOG_LEVEL_INFO :
                $service->info($message, $user->getUsername());
                break;
            case Log::LOG_LEVEL_WARN :
                $service->warn($message, $user->getUsername());
                break;
            case Log::LOG_LEVEL_ERROR :
                $service->error($message, $user->getUsername());
                break;
        }
    }
}
