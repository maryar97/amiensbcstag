<?php

namespace App\Entity;

use App\Entity\Commande;
use App\Entity\FormeDeBoxe;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PanierRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $panierqte = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $prixunite = null;

    #[ORM\Column]
    private ?int $total = null;


    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: "panier")]
    private $commandes;

    #[ORM\ManyToOne(targetEntity: FormeDeBoxe::class, inversedBy: "paniers")]
    #[ORM\JoinColumn(name: "forme_de_boxe_id", referencedColumnName: "id")]
    private ?FormeDeBoxe $formeDeBoxe = null;
    

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanierqte(): ?int
    {
        return $this->panierqte;
    }

    public function setPanierqte(int $panierqte): static
    {
        $this->panierqte = $panierqte;

        return $this;
    }

    public function getPrixunite(): ?string
    {
        return $this->prixunite;
    }

    public function setPrixunite(string $prixunite): static
    {
        $this->prixunite = $prixunite;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setPanier($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getPanier() === $this) {
                $commande->setPanier(null);
            }
        }

        return $this;
    }

    public function getFormeDeBoxe(): ?FormeDeBoxe
    {
        return $this->formeDeBoxe;
    }

    public function setFormeDeBoxe(?FormeDeBoxe $formeDeBoxe): self
    {
        $this->formeDeBoxe = $formeDeBoxe;

        return $this;
    }
}
