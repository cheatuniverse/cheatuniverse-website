<?php

namespace App\Migrations\Helpers\Create;

use App\Entity\Launcher as LauncherEntity;

class Launcher extends LauncherEntity
{
	private $platform;

	public function __construct(string $platform, string $name, string $url)
	{
		parent::__construct();

		$this->platform = $platform;
		$this->setName($name);
		$this->setUrl($url);
	}

	public function toInsertStatement(): string
	{
		return \sprintf(
			"('%s', '%s', '%s', '%s')",
			$this->getId(),
			$this->getName(),
			$this->getUrl(),
			$this->platform
		);
	}
}
