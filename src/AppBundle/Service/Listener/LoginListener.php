<?php

namespace AppBundle\Service\Listener;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener {

	private $securityContext;
	private $em;
	private $templating;

	public function __construct(SecurityContext $securityContext, Doctrine $doctrine, $templating) {
		$this->securityContext = $securityContext;
		$this->em = $doctrine->getEntityManager();
		$this->templating = $templating;
	}

	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event, $responseEvent) {
		if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
			$user = $event->getAuthenticationToken()->getUser();
			var_dump($responseEvent);die();
			
			$response = $this->templating->render('AppBundle:Security:firstLogin.html.twig', array(
				'user' => $user,
			));
			
			$responseEvent->setResponse($response);
		}
	}

}
