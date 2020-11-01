<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LauncherRepository;
use App\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     	collectionOperations={
 *     		"get"={"normalization_context"={"groups"={"get_launcher_list"}}},
 *     		"post"={
 *     			"normalization_context"={"groups"={"create_launcher"}},
 *     			"denormalization_context"={"groups"={"create_launcher"}},
 *     			"security"="is_granted('ROLE_ADMIN')"
 *	 		}
 *	 	},
 *     	itemOperations={
 *     		"get"={
 *     			"normalization_context"={"groups"={"get_launcher_item"}},
 *     			"security"="is_granted('ROLE_MODERATOR')"
 * 			}
 *	 	}
 * )
 * @ORM\Entity(repositoryClass=LauncherRepository::class)
 */
class Launcher
{
	use IdTrait;

	/**
	 * @ORM\Column(type="string", length=10)
	 * @Groups({"create_launcher", "get_launcher_list", "get_platform_list", "get_launcher_item", "get_platform_item"})
	 */
	private $name;

	/**
	 * @ORM\Column
	 * @Groups({"create_launcher", "get_launcher_list", "get_platform_list", "get_launcher_item", "get_platform_item"})
	 */
	private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Platform::class, inversedBy="launchers")
     * @ORM\JoinColumn(nullable=false)
	 * @Groups({"create_launcher", "get_launcher_list", "get_launcher_item"})
     */
    private $platform;

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function setUrl(string $url): self
	{
		$this->url = $url;

		return $this;
	}

    public function getPlatform(): ?Platform
    {
        return $this->platform;
    }

    public function setplatform(?Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }
}
