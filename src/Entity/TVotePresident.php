<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TVotePresidentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVotePresidentRepository::class)]
class TVotePresident
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_electeur = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_prenom_electeur = null;

    #[ORM\Column(length: 255)]
    private ?string $login_email = null;

    #[ORM\Column(length: 1000)]
    private ?string $mot_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column]
    private ?int $etat_vote = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure_cnx = null;

    #[ORM\Column]
    private ?int $Djeneba_Diawara = null;

    #[ORM\Column]
    private ?int $Faran_Sidibe = null;

    #[ORM\Column]
    private ?int $Moussa_Diomande = null;

    #[ORM\Column]
    private ?int $Vote_Blanc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroElecteur(): ?int
    {
        return $this->numero_electeur;
    }

    public function setNumeroElecteur(int $numero_electeur): static
    {
        $this->numero_electeur = $numero_electeur;

        return $this;
    }

    public function getNomPrenomElecteur(): ?string
    {
        return $this->nom_prenom_electeur;
    }

    public function setNomPrenomElecteur(string $nom_prenom_electeur): static
    {
        $this->nom_prenom_electeur = $nom_prenom_electeur;

        return $this;
    }

    public function getLoginEmail(): ?string
    {
        return $this->login_email;
    }

    public function setLoginEmail(string $login_email): static
    {
        $this->login_email = $login_email;

        return $this;
    }

    public function getMotPasse(): ?string
    {
        return $this->mot_passe;
    }

    public function setMotPasse(string $mot_passe): static
    {
        $this->mot_passe = $mot_passe;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getEtatVote(): ?int
    {
        return $this->etat_vote;
    }

    public function setEtatVote(int $etat_vote): static
    {
        $this->etat_vote = $etat_vote;

        return $this;
    }

    public function getDateHeureCnx(): ?\DateTimeInterface
    {
        return $this->date_heure_cnx;
    }

    public function setDateHeureCnx(\DateTimeInterface $date_heure_cnx): static
    {
        $this->date_heure_cnx = $date_heure_cnx;

        return $this;
    }

    public function getDjenebaDiawara(): ?int
    {
        return $this->Djeneba_Diawara;
    }

    public function setDjenebaDiawara(int $Djeneba_Diawara): static
    {
        $this->Djeneba_Diawara = $Djeneba_Diawara;

        return $this;
    }

    public function getFaranSidibe(): ?int
    {
        return $this->Faran_Sidibe;
    }

    public function setFaranSidibe(int $Faran_Sidibe): static
    {
        $this->Faran_Sidibe = $Faran_Sidibe;

        return $this;
    }

    public function getMoussaDiomande(): ?int
    {
        return $this->Moussa_Diomande;
    }

    public function setMoussaDiomande(int $Moussa_Diomande): static
    {
        $this->Moussa_Diomande = $Moussa_Diomande;

        return $this;
    }

    public function getVoteBlanc(): ?int
    {
        return $this->Vote_Blanc;
    }

    public function setVoteBlanc(int $Vote_Blanc): static
    {
        $this->Vote_Blanc = $Vote_Blanc;

        return $this;
    }
}
