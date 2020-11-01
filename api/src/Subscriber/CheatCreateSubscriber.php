<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Cheat;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Guard\AuthenticatorInterface;

class CheatCreateSubscriber implements EventSubscriberInterface
{
	private $authenticator;

	public function __construct(Security $authenticator)
	{
		$this->authenticator = $authenticator;
	}

	/**
     * @return array<string, array<int, int|string>>
     */
	public static function getSubscribedEvents(): array
	{
		return [
			KernelEvents::VIEW => ['cheatCreate', EventPriorities::PRE_WRITE]
		];
	}

	public function cheatCreate(ViewEvent $event): void
	{
		$cheat = $event->getControllerResult();

		if (!($cheat instanceof Cheat && Request::METHOD_POST === $event->getRequest()->getMethod())) {
			return;
		}

		$user = $this->authenticator->getUser();

		if (!$user instanceof User) {
			return;
		}

		$cheat->setSubmitter($user);
		$cheat->setApproved(false);
	}
}
