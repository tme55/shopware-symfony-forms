<?php


namespace ShopwareSymfonyForms\FormFactory\Manager;

use Shopware\Components\Model\ModelManager;

/**
 * @author Martin Schindler
 * @copyright dasistweb GmbH (http://www.dasistweb.de)
 * Date: 17.11.15
 * Time: 17:22
 */
class ExtendedEntityManager extends ModelManager
{
    /**
     * ExtendedEntityManager constructor.
     * @param ModelManager $em
     */
    public function __construct(ModelManager $em)
    {
        parent::__construct($em->getConnection(), $em->getConfiguration(), $em->getEventManager());
    }

    /**
     * returns the extended entity manager itself
     * @author Martin Schindler
     * @return $this
     */
    public function getManagerForClass()
    {
        return $this;
    }
}