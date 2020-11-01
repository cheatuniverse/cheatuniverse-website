<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagRepository;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
	use IdTrait;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Groups({"get_list", "get_item"})
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Cheat::class, inversedBy="tags")
     */
    private $cheats;

    public function __construct()
    {
        $this->cheats = new ArrayCollection();
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
        }

        return $this;
    }

    public function removeCheat(Cheat $cheat): self
    {
        if ($this->cheats->contains($cheat)) {
            $this->cheats->removeElement($cheat);
        }

        return $this;
    }
}
