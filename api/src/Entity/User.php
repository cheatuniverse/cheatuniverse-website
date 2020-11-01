<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     	collectionOperations={
 *     		"get"={
 *     			"normalization_context"={"groups"={"get_list"}},
 *     			"security"="is_granted('ROLE_ADMIN')"
 *	 		},
 *     		"post"={
 *     			"normalization_context"={"groups"={"create_user_response"}},
 *     			"denormalization_context"={"groups"={"create_user"}}
 *	 		}
 *	 	},
 *     	itemOperations={
 *     		"get"={
 *     			"normalization_context"={"groups"={"get_item"}},
 *     			"security"="is_granted('ROLE_ADMIN') or subject === object"
 * 			},
 *     		"put"={
 *     			"normalization_context"={"groups"={"update_user"}},
 *     			"denormalization_context"={"groups"={"update_user_response"}},
 *     			"security"="is_granted('ROLE_ADMIN') or subject === object"
 * 			},
 *     		"delete"={"security"="is_granted('ROLE_ADMIN') or subject === object"},
 *	 	}
 * )
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
	use IdTrait;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
	 * @Groups({"get_list", "create_user", "create_user_response", "update_user", "update_user_response"})
     */
    private $username;

    /**
     * @ORM\Column(type="json")
	 * @Groups({"get_list"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
	 * @Groups({"create_user", "update_user"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
	 * @Groups({"get_list", "create_user", "create_user_response", "update_user", "update_user_response"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $authenticationToken;

    /**
     * @ORM\OneToMany(targetEntity=Cheat::class, mappedBy="submitter")
     */
    private $submittedCheats;

    /**
     * @ORM\ManyToMany(targetEntity=Cheat::class, mappedBy="cheat_approvals")
     */
    private $user_approvals;

    public function __construct()
    {
        $this->submittedCheats = new ArrayCollection();
        $this->user_approvals = new ArrayCollection();
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAuthenticationToken(): string
    {
        return $this->authenticationToken;
    }

    public function setAuthenticationToken(string $authenticationToken): self
    {
        $this->authenticationToken = $authenticationToken;

        return $this;
    }

    /**
     * @return Collection|Cheat[]
     */
    public function getSubmittedCheats(): Collection
    {
        return $this->submittedCheats;
    }

    public function addSubmittedCheat(Cheat $submittedCheat): self
    {
        if (!$this->submittedCheats->contains($submittedCheat)) {
            $this->submittedCheats[] = $submittedCheat;
            $submittedCheat->setSubmitter($this);
        }

        return $this;
    }

    public function removeSubmittedCheat(Cheat $submittedCheat): self
    {
        if ($this->submittedCheats->contains($submittedCheat)) {
            $this->submittedCheats->removeElement($submittedCheat);
            // set the owning side to null (unless already changed)
            if ($submittedCheat->getSubmitter() === $this) {
                $submittedCheat->setSubmitter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cheat[]
     */
    public function getUserApprovals(): Collection
    {
        return $this->user_approvals;
    }

    public function addUserApproval(Cheat $userApproval): self
    {
        if (!$this->user_approvals->contains($userApproval)) {
            $this->user_approvals[] = $userApproval;
            $userApproval->addCheatApproval($this);
        }

        return $this;
    }

    public function removeUserApproval(Cheat $userApproval): self
    {
        if ($this->user_approvals->contains($userApproval)) {
            $this->user_approvals->removeElement($userApproval);
            $userApproval->removeCheatApproval($this);
        }

        return $this;
    }
}
