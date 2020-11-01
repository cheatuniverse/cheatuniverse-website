<?php

namespace App\Migrations\Helpers\Create;

use App\Entity\Cheat as CheatEntity;

class Cheat extends CheatEntity
{
	private $version_id;

	public function __construct(string $version, string $name, string $dlLink, string $ytLink)
	{
		parent::__construct();

		$this->version_id = $version;
		$this->setName($name);
		$this->setDownloadLink($dlLink);
		$this->setYoutubeLink($ytLink);
	}

	public function toInsertStatement(): string
	{
		return \sprintf(
			"('%s', '%s', '%s', '%s', '%s', true)",
			$this->getId(),
			$this->version_id,
			$this->getName(),
			$this->getDownloadLink(),
			$this->getYoutubeLink()
		);
	}
}
