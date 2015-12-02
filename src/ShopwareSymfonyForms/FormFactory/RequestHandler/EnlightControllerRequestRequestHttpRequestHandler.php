<?php

namespace ShopwareSymfonyForms\FormFactory\RequestHandler;

use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\RequestHandlerInterface;
use Symfony\Component\Form\Util\ServerParams;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EnlightControllerRequestRequestHttpRequestHandler
 * @author Martin Schindler
 * @package ShopwareSymfonyForms\FormFactory\RequestHandler
 */
class EnlightControllerRequestRequestHttpRequestHandler implements RequestHandlerInterface
{
    /**
     * @var ServerParams
     */
    private $serverParams;

    /**
     * {@inheritdoc}
     */
    public function __construct(ServerParams $serverParams = null)
    {
        $this->serverParams = $serverParams ?: new ServerParams();
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(FormInterface $form, $request = null)
    {
        if (!is_null($request) AND !$request instanceof \Enlight_Controller_Request_RequestHttp) {
            throw new UnexpectedTypeException($request, '\Enlight_Controller_Request_RequestHttp');
        }

        $request = new Request();
        $request = $request->createFromGlobals();
        $handler = new HttpFoundationRequestHandler();
        $handler->handleRequest($form, $request);
    }
}
