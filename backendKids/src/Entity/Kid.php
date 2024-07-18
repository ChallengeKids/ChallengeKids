<?php

namespace App\Entity;

use App\Repository\KidRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KidRepository::class)]
class Kid extends User
{

    #[ORM\Column(nullable: true)]
    private ?array $friends = null;

    #[ORM\Column(nullable: true)]
    private ?int $points = null;

    /**
     * @var Collection<int, Challenge>
     */
    #[ORM\OneToMany(targetEntity: Challenge::class, mappedBy: 'kid')]
    private Collection $challenges;

    /**
     * @var Collection<int, KidResponse>
     */
    #[ORM\OneToMany(targetEntity: KidResponse::class, mappedBy: 'kid')]
    private Collection $responses;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'kid')]
    private Collection $interests;

    #[ORM\Column(length: 255)]
    private ?string $level = 'first class';

    public function __construct()
    {
        $this->challenges = new ArrayCollection();
        $this->responses = new ArrayCollection();
        $this->interests = new ArrayCollection();
    }

    public function getFriends(): ?array
    {
        return $this->friends;
    }

    public function setFriends(?array $friends): static
    {
        $this->friends = $friends;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getRoles(): array
    {
        return ['ROLE_KID'];
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    /**
     * @return Collection<int, Challenge>
     */
    public function getChallenges(): Collection
    {
        return $this->challenges;
    }

    public function addChallenge(Challenge $challenge): static
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges->add($challenge);
            $challenge->setKid($this);
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): static
    {
        if ($this->challenges->removeElement($challenge)) {
            // set the owning side to null (unless already changed)
            if ($challenge->getKid() === $this) {
                $challenge->setKid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KidResponse>
     */
    public function getResponses(): Collection
    {
        return $this->responses;
    }

    public function addResponse(KidResponse $response): static
    {
        if (!$this->responses->contains($response)) {
            $this->responses->add($response);
            $response->setKid($this);
        }

        return $this;
    }

    public function removeResponse(KidResponse $response): static
    {
        if ($this->responses->removeElement($response)) {
            // set the owning side to null (unless already changed)
            if ($response->getKid() === $this) {
                $response->setKid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getInterests(): Collection
    {
        return $this->interests;
    }

    public function addInterest(Category $interest): static
    {
        if (!$this->interests->contains($interest)) {
            $this->interests->add($interest);
            $interest->setKid($this);
        }

        return $this;
    }

    public function removeInterest(Category $interest): static
    {
        if ($this->interests->removeElement($interest)) {
            // set the owning side to null (unless already changed)
            if ($interest->getKid() === $this) {
                $interest->setKid(null);
            }
        }

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }
}
