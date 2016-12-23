<?php


namespace ShopwareSymfonyForms\FormFactory\Manager;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Martin Schindler
 * @copyright dasistweb GmbH (http://www.dasistweb.de)
 * Date: 17.11.15
 * Time: 17:22
 */
class ExtendedEntityManager implements ManagerRegistry
{

    /** @var array */
    private $connections;

    /** @var array */
    private $managers;

    /** @var object|\Shopware\Components\Model\ModelManager */
    protected $em;

    /**
     * ExtendedEntityManager constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $this->container->get('models');
    }


    /**
     * @param string $alias
     * @author Martin Schindler
     * @return string
     */
    public function getAliasNamespace($alias)
    {
        return $alias;
    }

    /**
     * {@inheritdoc}
     */
    public function getConnection($name = null)
    {
        return $this->em->getConnection();
    }

    /**
     * {@inheritdoc}
     */
    public function getConnectionNames()
    {
        return $this->connections;
    }

    /**
     * {@inheritdoc}
     */
    public function getConnections()
    {
        $connections = [];
        foreach ($this->connections as $name => $id) {
            $connections['models'] = 'models';
        }

        return $connections;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultConnectionName()
    {
        return 'models';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultManagerName()
    {
        return 'models';
    }

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     */
    public function getManager($name = null)
    {
        return $this->em;
    }

    /**
     * {@inheritdoc}
     */
    public function getManagerForClass($class)
    {
        return $this->em;
    }

    /**
     * {@inheritdoc}
     */
    public function getManagerNames()
    {
        return $this->managers;
    }

    /**
     * {@inheritdoc}
     */
    public function getManagers()
    {
        return array(
            $this->em
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository($persistentObjectName, $persistentManagerName = null)
    {
        return $this->em->getRepository($persistentObjectName);
    }

    /**
     * {@inheritdoc}
     */
    public function resetManager($name = null)
    {
        $this->container->set('models', $this->em);
    }

}
