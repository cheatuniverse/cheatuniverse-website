<?php

namespace App\Subscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Mailer\MailerHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class UserRegisteredSubscriber implements EventSubscriberInterface
{
	private $mailerHelper;

	public function __construct(MailerHelper $mailerHelper)
	{
		$this->mailerHelper = $mailerHelper;
	}

	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::VIEW => ['userCreated', EventPriorities::POST_WRITE]
		];
	}

	public function userCreated(ViewEvent $event): void
	{
		$user = $event->getControllerResult();

		if (!($user instanceof User && Request::METHOD_POST === $event->getRequest()->getMethod())) {
			return;
		}

		$this->mailerHelper->send(
			$user->getEmail(),
			'Bienvenue sur Cheatuniverse.me',
			'registered',
			[
				'username' => $user->getUsername(),
				'redirect_url' => getenv('DOMAIN').'/login'
			]
		);
	}
}
