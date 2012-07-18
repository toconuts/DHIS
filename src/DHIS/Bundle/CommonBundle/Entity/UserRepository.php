<?php

namespace DHIS\Bundle\CommonBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * UserRepository.
 *
 * @author Natsuki Hara <toconuts@gmail.com>
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
    /**
     * @inheritDoc 
     */
    public function loadUserByUsername($username)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->select('u, g')
            ->leftJoin('u.groups', 'g')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
        ;
        
        try {
            $user = $q->getSingleResult();   
        } catch (\NoResultException $e) {
            throw new UsernameNotFoundException(sprintf(
                    'Unable to find an active admin DHISCommonBundle:User object'
                    .' identified by "%s".', $username), null, 0, $e);
        }
        return $user;
    }
    
    /**
     * @inheritDoc 
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($class);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf(
                    'Instances of "%s" are not supported.', $class));
        }

        return $this->loadUserByUsername($user->getUsername());
    }
    
    /**
     * @inheritDoc 
     */
    public function supportsClass($class)
    {
        return $this->getEntityName() === $class 
                || is_subclass_of($class, $this->getEntityName());
    }
}
