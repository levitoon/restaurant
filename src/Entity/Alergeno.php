<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlergenoRepository")
 */
class Alergeno
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Plato", mappedBy="alergenos")
     */
    private $platos;

    public function __construct()
    {
        $this->platos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Plato[]
     */
    public function getPlatos(): Collection
    {
        return $this->platos;
    }

    public function addPlato(Plato $plato): self
    {
        if (!$this->platos->contains($plato)) {
            $this->platos[] = $plato;
            $plato->addElergeno($this);
        }

        return $this;
    }

    public function removePlato(Plato $plato): self
    {
        if ($this->platos->contains($plato)) {
            $this->platos->removeElement($plato);
            $plato->removeElergeno($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

}
