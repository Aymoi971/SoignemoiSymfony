<?php

namespace App\Entity;

use App\Repository\ItemPrescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemPrescriptionRepository::class)]
class ItemPrescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Medicament = null;

    #[ORM\Column(length: 255)]
    private ?string $Posologie = null;

    #[ORM\ManyToOne(inversedBy: 'ItemPrescrit')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prescription $prescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicament(): ?string
    {
        return $this->Medicament;
    }

    public function setMedicament(string $Medicament): static
    {
        $this->Medicament = $Medicament;

        return $this;
    }

    public function getPosologie(): ?string
    {
        return $this->Posologie;
    }

    public function setPosologie(string $Posologie): static
    {
        $this->Posologie = $Posologie;

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->prescription;
    }

    public function setPrescription(?Prescription $prescription): static
    {
        $this->prescription = $prescription;

        return $this;
    }
}
