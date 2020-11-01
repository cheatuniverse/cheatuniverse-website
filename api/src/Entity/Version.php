<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VersionRepository;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
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
 * @ORM\Entity(repositoryClass=VersionRepository::class)
 */
class Version
{
	use IdTrait;

    /**
     * @ORM\Column(type="string", length=128)
	 * @Groups({"get_list", "get_item", "get_cheat_list"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Cheat::class, mappedBy="version", orphanRemoval=true)
     */
    private $cheats;

    public function __construct()
    {
        $this->cheats = new ArrayCollection();
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

    /**
     * @return Collection|Cheat[]
     */
    public function getCheats(): Collection
    {
        return $this->cheats;
    }

    public function addCheat(Cheat $cheat): self
    {
        if (!$this->cheats->contains($cheat)) {
            $this->cheats[] = $cheat;
            $cheat->setVersion($this);
        }

        return $this;
    }

    public function removeCheat(Cheat $cheat): self
    {
        if ($this->cheats->contains($cheat)) {
            $this->cheats->removeElement($cheat);
            // set the owning side to null (unless already changed)
            if ($cheat->getVersion() === $this) {
                $cheat->setVersion(null);
            }
        }

        return $this;
    }
}
