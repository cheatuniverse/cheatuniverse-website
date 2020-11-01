<?php

namespace App\Mailer;

use Symfony\Component\Mailer\Bridge\Mailgun\Transport\MailgunSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailerHelper
{
	private $environment;
	private $mailer;

	public function __construct(Environment $environment)
	{
		$this->environment = $environment;
		$this->mailer = new Mailer(new MailgunSmtpTransport(getenv('MAIL_USER'), getenv('MAIL_PASS'), 'eu'));
	}

	public function send(string $to, string $title, string $template, array $params = []): void
	{
		$email = (new Email())
			->from(new Address(getenv('MAIL_USER')))
			->replyTo(getenv('MAIL_USER'))
			->to($to)
			->subject($title)
			->html(
				$this->environment->render(
					$template.'.html.twig',
					$params
				)
			);
		$this->mailer->send($email);
	}
}
