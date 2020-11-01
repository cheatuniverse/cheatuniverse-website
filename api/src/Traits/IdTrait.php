<?php


namespace App\Traits;


use Ramsey\Uuid\Uuid;

trait IdTrait
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $id;

	public function __construct()
	{
		$this->id = Uuid::uuid4()->toString();
	}

	public function getId(): string
	{
		return $this->id ?? Uuid::uuid4()->toString();
	}
}
