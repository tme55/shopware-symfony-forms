<?php

namespace ShopwareSymfonyForms\SmartyForm\Parser;

use Symfony\Component\Templating\TemplateReference;
use Symfony\Component\Templating\TemplateNameParserInterface;

/**
 * Class TemplateNameParser
 * @author Martin Schindler
 * @package ShopwareSymfonyForms\SmartyForm\Parser
 */
class TemplateNameParser implements TemplateNameParserInterface
{
    /** @var $rootPath */
    private $rootPath;

    /**
     * SimpleTemplateNameParser constructor.
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * Parse the file
     * @param string|\Symfony\Component\Templating\TemplateReferenceInterface $name
     * @author Martin Schindler
     * @return TemplateReference
     */
    public function parse($name)
    {
        if (false !== strpos($name, ':')) {
            $path = str_replace(':', '/', $name);
        } else {
            $path = $this->rootPath . '/' . $name;
        }
        return new TemplateReference($path, 'php');
    }
}