<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CheatRepository;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     	attributes={"order"={"name": "ASC"}},
 *     	collectionOperations={
 *     		"get"={"normalization_context"={"groups"={"get_cheat_list"}}},
 *     		"post"={
 *     			"normalization_context"={"groups"={"create_cheat"}},
 *     			"denormalization_context"={"groups"={"create_cheat"}},
 *     			"security"="is_granted('IS_AUTHENTICATED_FULLY')"
 *	 		}
 *	 	},
 *     	itemOperations={
 *     		"get"={
 *     			"normalization_context"={"groups"={"get_cheat_item"}},
 *     			"security"="is_granted('ROLE_MODERATOR')"
 * 			}
 *	 	}
 * )
 * @ORM\Entity(repositoryClass=CheatRepository::class)
 */
class Cheat
{
    use IdTrait;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1024)
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $downloadLink;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $youtubeLink;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="cheats")
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="cheats")
     * @ORM\JoinColumn(nullable=false)
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $version;

    /**
     * @ORM\Column(type="boolean")
	 * @Groups({"create_cheat", "get_cheat_list", "get_cheat_item"})
     */
    private $approved;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="submittedCheats")
     * @ORM\JoinColumn(nullable=true)
     */
    private $submitter;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="user_approvals")
     */
    private $cheat_approvals;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->cheat_approvals = new ArrayCollection();
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

    public function getDownloadLink(): ?string
    {
        return $this->downloadLink;
    }

    public function setDownloadLink(string $downloadLink): self
    {
        $this->downloadLink = $downloadLink;

        return $this;
    }

    public function getYoutubeLink(): ?string
    {
        return $this->youtubeLink;
    }

    public function setYoutubeLink(?string $youtubeLink): self
    {
        $this->youtubeLink = $youtubeLink;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addCheat($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeCheat($this);
        }

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getSubmitter(): ?User
    {
        return $this->submitter;
    }

    public function setSubmitter(?User $submitter): self
    {
        $this->submitter = $submitter;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCheatApprovals(): Collection
    {
        return $this->cheat_approvals;
    }

    public function addCheatApproval(User $cheatApproval): self
    {
        if (!$this->cheat_approvals->contains($cheatApproval)) {
            $this->cheat_approvals[] = $cheatApproval;
        }

        return $this;
    }

    public function removeCheatApproval(User $cheatApproval): self
    {
        if ($this->cheat_approvals->contains($cheatApproval)) {
            $this->cheat_approvals->removeElement($cheatApproval);
        }

        return $this;
    }
}
