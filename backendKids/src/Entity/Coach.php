<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
class Coach extends User
{


    /**
     * @var Collection<int, Challenge>
     */
    #[ORM\OneToMany(targetEntity: Challenge::class, mappedBy: 'coach')]
    private Collection $challenges;

    /**
     * @var Collection<int, Category>
     */
    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'coaches')]
    private Collection $teachingDomains;

    #[ORM\Column(nullable: true)]
    private ?bool $Accepted = null;

    public function __construct()
    {
        $this->challenges = new ArrayCollection();
        $this->teachingDomains = new ArrayCollection();
    }

    public function getRoles(): array
    {
        return ['ROLE_COACH'];
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
            $challenge->setCoach($this);
        }

        return $this;
    }

    public function removeChallenge(Challenge $challenge): static
    {
        if ($this->challenges->removeElement($challenge)) {
            // set the owning side to null (unless already changed)
            if ($challenge->getCoach() === $this) {
                $challenge->setCoach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getTeachingDomains(): Collection
    {
        return $this->teachingDomains;
    }

    public function addTeachingDomain(Category $teachingDomain): static
    {
        if (!$this->teachingDomains->contains($teachingDomain)) {
            $this->teachingDomains->add($teachingDomain);
        }

        return $this;
    }

    public function removeTeachingDomain(Category $teachingDomain): static
    {
        $this->teachingDomains->removeElement($teachingDomain);

        return $this;
    }

    public function isAccepted(): ?bool
    {
        return $this->Accepted;
    }

    public function setAccepted(?bool $Accepted): static
    {
        $this->Accepted = $Accepted;

        return $this;
    }
}
