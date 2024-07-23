<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, ItemPrescription>
     */
    #[ORM\OneToMany(targetEntity: ItemPrescription::class, mappedBy: 'prescription', orphanRemoval: true)]
    private Collection $ItemPrescrit;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\OneToOne(mappedBy: 'Prescription', cascade: ['persist', 'remove'])]
    private ?Visite $visite = null;

    public function __construct()
    {
        $this->ItemPrescrit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ItemPrescription>
     */
    public function getItemPrescrit(): Collection
    {
        return $this->ItemPrescrit;
    }

    public function addItemPrescrit(ItemPrescription $itemPrescrit): static
    {
        if (!$this->ItemPrescrit->contains($itemPrescrit)) {
            $this->ItemPrescrit->add($itemPrescrit);
            $itemPrescrit->setPrescription($this);
        }

        return $this;
    }

    public function removeItemPrescrit(ItemPrescription $itemPrescrit): static
    {
        if ($this->ItemPrescrit->removeElement($itemPrescrit)) {
            // set the owning side to null (unless already changed)
            if ($itemPrescrit->getPrescription() === $this) {
                $itemPrescrit->setPrescription(null);
            }
        }

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getVisite(): ?Visite
    {
        return $this->visite;
    }

    public function setVisite(?Visite $visite): static
    {
        // unset the owning side of the relation if necessary
        if ($visite === null && $this->visite !== null) {
            $this->visite->setPrescription(null);
        }

        // set the owning side of the relation if necessary
        if ($visite !== null && $visite->getPrescription() !== $this) {
            $visite->setPrescription($this);
        }

        $this->visite = $visite;

        return $this;
    }
}
