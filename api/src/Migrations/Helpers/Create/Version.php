<?php

namespace App\Migrations\Helpers\Create;

use App\Entity\Version as VersionEntity;

class Version extends VersionEntity
{
	public function __construct(string $name)
	{
		parent::__construct();

		$this->setName($name);
	}

	public function toInsertStatement(): string
	{
		return \sprintf(
			"('%s', '%s')",
			$this->getId(),
			$this->getName()
		);
	}
}
