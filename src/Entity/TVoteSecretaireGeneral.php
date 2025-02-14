<?php

namespace App\Entity;

use App\Repository\TVoteSecretaireGeneralRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVoteSecretaireGeneralRepository::class)]
class TVoteSecretaireGeneral
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_electeur = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_prenom_electeur = null;

    #[ORM\Column(length: 100)]
    private ?string $login_email = null;

    #[ORM\Column(length: 50)]
    private ?string $mot_passe = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column]
    private ?int $etat_vote = null;

    #[ORM\Column]
    private ?int $Mathieu_Coulibaly = null;

    #[ORM\Column]
    private ?int $Sidi_Diawara = null;

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

    public function getMathieuCoulibaly(): ?int
    {
        return $this->Mathieu_Coulibaly;
    }

    public function setMathieuCoulibaly(int $Mathieu_Coulibaly): static
    {
        $this->Mathieu_Coulibaly = $Mathieu_Coulibaly;

        return $this;
    }

    public function getSidiDiawara(): ?int
    {
        return $this->Sidi_Diawara;
    }

    public function setSidiDiawara(int $Sidi_Diawara): static
    {
        $this->Sidi_Diawara = $Sidi_Diawara;

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
