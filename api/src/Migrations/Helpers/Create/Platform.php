<?php

namespace App\Migrations\Helpers\Create;

use App\Entity\Platform as PlatformEntity;

class Platform extends PlatformEntity
{
	public function __construct(string $name, string $logo)
	{
		parent::__construct();

		$this->setName($name);
		$this->setName($name);
		$this->setLogo($logo);
	}

	public function toInsertStatement(): string
	{
		return \sprintf(
			"('%s', '%s', '%s')",
			$this->getId(),
			$this->getName(),
			$this->getLogo()
		);
	}
}
