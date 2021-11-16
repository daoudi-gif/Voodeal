<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Annonces::class, inversedBy="name")
     */
    private $annonces_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->annonces_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Annonces[]
     */
    public function getAnnoncesId(): Collection
    {
        return $this->annonces_id;
    }

    public function addAnnoncesId(Annonces $annoncesId): self
    {
        if (!$this->annonces_id->contains($annoncesId)) {
            $this->annonces_id[] = $annoncesId;
        }

        return $this;
    }

    public function removeAnnoncesId(Annonces $annoncesId): self
    {
        $this->annonces_id->removeElement($annoncesId);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
