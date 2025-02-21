<?php

namespace App\Entity;

use App\Repository\TVoteSecretaireGeneralAdjointRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVoteSecretaireGeneralAdjointRepository::class)]
class TVoteSecretaireGeneralAdjoint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_electeur = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_prenom_electeur = null;

    #[ORM\Column(length: 50)]
    private ?string $mot_passe = null;

    #[ORM\Column(length: 100)]
    private ?string $login_email = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column]
    private ?int $etat_vote = null;

    #[ORM\Column]
    private ?int $HAIDARA_Mohamed_Lamine = null;

    #[ORM\Column]
    private ?int $Keita_Fatoumata = null;

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

    public function getMotPasse(): ?string
    {
        return $this->mot_passe;
    }

    public function setMotPasse(string $mot_passe): static
    {
        $this->mot_passe = $mot_passe;

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

    public function getHAIDARAMohamedLamine(): ?int
    {
        return $this->HAIDARA_Mohamed_Lamine;
    }

    public function setHAIDARAMohamedLamine(int $HAIDARA_Mohamed_Lamine): static
    {
        $this->HAIDARA_Mohamed_Lamine = $HAIDARA_Mohamed_Lamine;

        return $this;
    }

    public function getKeitaFatoumata(): ?int
    {
        return $this->Keita_Fatoumata;
    }

    public function setKeitaFatoumata(int $Keita_Fatoumata): static
    {
        $this->Keita_Fatoumata = $Keita_Fatoumata;

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
