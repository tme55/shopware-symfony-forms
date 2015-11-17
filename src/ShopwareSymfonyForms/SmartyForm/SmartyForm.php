<?php
/**
 * @author Martin Schindler
 * @copyright dasistweb GmbH (http://www.dasistweb.de)
 * Date: 17.11.15
 * Time: 12:24
 */

namespace ShopwareSymfonyForms\SmartyForm;

use ShopwareSymfonyForms\SmartyForm\Plugins\SmartyPlugins;
use ShopwareSymfonyForms\SmartyForm\Parser\TemplateNameParser;
use Smarty;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper;
use Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper;
use Symfony\Component\Form\Extension\Templating\TemplatingRendererEngine;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormFactoryBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\Forms;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Validation;

/**
 * Class SmartyForm
 * @author Martin Schindler
 * @package ShopwareSymfonyForms\SmartyForm
 */
class SmartyForm
{

    const VIEW_PATH = __DIR__ . '/Resources/Views/Form';

    /** @var FormFactoryBuilderInterface $formFactoryBuilder */
    protected $formFactoryBuilder;

    /** @var FormFactoryInterface $formFactory */
    protected $formFactory;

    /** @var string $symfonyVendorDir */
    protected $symfonyVendorDir = __DIR__ . "/../../../../../symfony";

    /** @var null|FormHelper $formHelper */
    protected $formHelper = null;

    /** @var null|SmartyPlugins $smartyPlugins */
    protected $smartyPlugins = null;

    /** @var string $defaultLocale */
    protected $defaultLocale = "en";

    /**
     * SmartyForm constructor.
     * @param Smarty $smarty
     */
    public function __construct(Smarty $smarty)
    {
        $validator = Validation::createValidator();
        $this->formFactoryBuilder = Forms::createFormFactoryBuilder();

        # configuring the form factory
        $this->formFactory = $this->formFactoryBuilder
            ->addExtension(new ValidatorExtension($validator))
            ->getFormFactory();

        # registering all necessary smarty plugins
        $this->smartyPlugins = new SmartyPlugins($this->getFormHelper(), $smarty);
    }

    /**
     * Get the form factory builder
     * @author Martin Schindler
     * @return \Symfony\Component\Form\FormFactoryBuilderInterface
     */
    public function getFormFactoryBuilder()
    {
        return $this->formFactoryBuilder;
    }

    /**
     * Get the pre configured form factory
     * @author Martin Schindler
     * @return \Symfony\Component\Form\FormFactoryInterface
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    /**
     * Get the smarty plugins
     * @author Martin Schindler
     * @return null|SmartyPlugins
     */
    public function getSmartyPlugins()
    {
        return $this->smartyPlugins;
    }

    /**
     * Get list of paths to the symfony form themes
     * @author Martin Schindler
     * @return array
     */
    protected function getFormThemePaths()
    {
        $formDir = $this->symfonyVendorDir . '/framework-bundle/Resources/views/Form';
        $defaultThemes = array(
            $formDir,
            self::VIEW_PATH
        );

        return $defaultThemes;
    }

    /**
     * Get the form helper
     * @author Martin Schindler
     * @return FormHelper
     */
    public function getFormHelper()
    {
        if (!$this->formHelper) {
            $phpEngine = new PhpEngine(new TemplateNameParser(realpath(self::VIEW_PATH)), new FilesystemLoader(array()));

            $formHelper = new FormHelper(new FormRenderer(new TemplatingRendererEngine($phpEngine, $this->getFormThemePaths()), null));

            $translator = new Translator($this->defaultLocale);
            $translator->addLoader('xlf', new XliffFileLoader());
            $phpEngine->addHelpers(array($formHelper, new TranslatorHelper($translator)));

            $this->formHelper = $formHelper;
        }

        return $this->formHelper;
    }

    /**
     * Set the symfony vendor directory
     * @param $dir
     * @author Martin Schindler
     * @throws \Exception
     */
    public function setSymfonyVendorDir($dir)
    {
        if (realpath($dir) === false) {
            throw new \Exception('Symfony vendor directory "' . $dir . '" does not exist');
        }
        $this->symfonyVendorDir = $dir;
    }
}