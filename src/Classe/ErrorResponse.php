<?php

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ErrorRespnse
{
    protected $userManager;
    protected $router;
    protected $security;
    protected $dispatcher;

    public function __construct(UserManagerInterface $userManager, Router $router, SecurityContext $security, EventDispatcher $dispatcher)
    {
        $this->userManager = $userManager;
        $this->router = $router;
        $this->security = $security;
        $this->dispatcher = $dispatcher;
    }
}
