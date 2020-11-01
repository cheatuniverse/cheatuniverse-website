<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\KernelInterface;

class UserCreateSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<string, array<int, int|string>>
     */
	public static function getSubscribedEvents(): array
	{
		return [
			KernelEvents::VIEW => ['userCreate', EventPriorities::PRE_WRITE]
		];
	}

	public function userCreate(ViewEvent $event): void
	{
		$user = $event->getControllerResult();

		if (!($user instanceof User && Request::METHOD_POST === $event->getRequest()->getMethod())) {
			return;
		}

		$token = hash('sha512',$user->getUsername().(new \DateTime())->format('Y-m-d H:i:s'));
		$user->setAuthenticationToken($token);
	}
}
