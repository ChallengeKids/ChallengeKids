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
    #[ORM\OneToMany(targetEntity: Category::class, mappedBy: 'coach')]
    private Collection $teachingDomain;

    public function __construct()
    {
        $this->challenges = new ArrayCollection();
        $this->teachingDomain = new ArrayCollection();
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
    public function getTeachingDomain(): Collection
    {
        return $this->teachingDomain;
    }

    public function addTeachingDomain(Category $teachingDomain): static
    {
        if (!$this->teachingDomain->contains($teachingDomain)) {
            $this->teachingDomain->add($teachingDomain);
            $teachingDomain->setCoach($this);
        }

        return $this;
    }

    public function removeTeachingDomain(Category $teachingDomain): static
    {
        if ($this->teachingDomain->removeElement($teachingDomain)) {
            // set the owning side to null (unless already changed)
            if ($teachingDomain->getCoach() === $this) {
                $teachingDomain->setCoach(null);
            }
        }

        return $this;
    }
}
