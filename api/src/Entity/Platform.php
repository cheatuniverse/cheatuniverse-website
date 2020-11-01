<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlatformRepository;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     	attributes={"order"={"name": "ASC"}},
 *     	collectionOperations={
 *     		"get"={"normalization_context"={"groups"={"get_platform_list"}}}
 *	 	},
 *     	itemOperations={
 *     		"get"={
 *     			"normalization_context"={"groups"={"get_platform_item"}},
 *     			"security"="is_granted('ROLE_MODERATOR')"
 * 			}
 *	 	}
 * )
 * @ORM\Entity(repositoryClass=PlatformRepository::class)
 */
class Platform
{
	use IdTrait;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Groups({"create_platform", "get_platform_list", "get_platform_item"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1024)
	 * @Groups({"create_platform", "get_platform_list", "get_platform_item"})
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=Launcher::class, mappedBy="platform", orphanRemoval=true)
	 * @Groups({"create_platform", "get_platform_list", "get_platform_item"})
	 * @OrderBy({"name"="DESC"})
     */
    private $launchers;

    public function __construct()
    {
        $this->launchers = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Launcher[]
     */
    public function getLaunchers(): Collection
    {
        return $this->launchers;
    }

    public function addLauncher(Launcher $launcher): self
    {
        if (!$this->launchers->contains($launcher)) {
            $this->launchers[] = $launcher;
            $launcher->setplatform($this);
        }

        return $this;
    }

    public function removeLauncher(Launcher $launcher): self
    {
        if ($this->launchers->contains($launcher)) {
            $this->launchers->removeElement($launcher);
            // set the owning side to null (unless already changed)
            if ($launcher->getplatform() === $this) {
                $launcher->setplatform(null);
            }
        }

        return $this;
    }
}
