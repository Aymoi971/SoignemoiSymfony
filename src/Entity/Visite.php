<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisiteRepository::class)]
class Visite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'visites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patient $Patient = null;

    #[ORM\OneToOne(inversedBy: 'visite', cascade: ['persist', 'remove'])]
    private ?Avis $Avis = null;

    #[ORM\OneToOne(inversedBy: 'visite', cascade: ['persist', 'remove'])]
    private ?Prescription $Prescription = null;

    #[ORM\ManyToOne(inversedBy: 'visites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medecin $Medecin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->Patient;
    }

    public function setPatient(?Patient $Patient): static
    {
        $this->Patient = $Patient;

        return $this;
    }

    public function getAvis(): ?Avis
    {
        return $this->Avis;
    }

    public function setAvis(?Avis $Avis): static
    {
        $this->Avis = $Avis;

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->Prescription;
    }

    public function setPrescription(?Prescription $Prescription): static
    {
        $this->Prescription = $Prescription;

        return $this;
    }

    public function getMedecin(): ?Medecin
    {
        return $this->Medecin;
    }

    public function setMedecin(?Medecin $Medecin): static
    {
        $this->Medecin = $Medecin;

        return $this;
    }
}
