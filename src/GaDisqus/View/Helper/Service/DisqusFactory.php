<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace GaDisqus\View\Helper\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use GaDisqus\View\Helper\Disqus;

class DisqusFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return Disqus
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sl = $serviceLocator->getServiceLocator();
        $conf = $sl->get('Config');
        $disqusConf = $conf['disqus'];
        $helper = new Disqus();
        $helper->setOptions($disqusConf);
        return $helper;
    }
}