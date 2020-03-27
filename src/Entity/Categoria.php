<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\OneToMany(targetEntity="App\Entity\Plato", mappedBy="categoria")
     */
    private $platos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resumen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Media", cascade={"persist","remove"})
     *
     */
    private $imagen;

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

    public function setNombre(?string $nombre): self
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

    public function addPlato(?Plato $plato): self
    {
        if (!$this->platos->contains($plato)) {
            $this->platos[] = $plato;
            $plato->setCategoria($this);
        }

        return $this;
    }

    public function removePlato(Plato $plato): self
    {
        if ($this->platos->contains($plato)) {
            $this->platos->removeElement($plato);
            // set the owning side to null (unless already changed)
            if ($plato->getCategoria() === $this) {
                $plato->setCategoria(null);
            }
        }

        return $this;
    }

    public function getResumen(): ?string
    {
        return $this->resumen;
    }

    public function setResumen(?string $resumen): self
    {
        $this->resumen = $resumen;

        return $this;
    }

    public function getImagen(): ?Media
    {
        return $this->imagen;
    }

    public function setImagen(?Media $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }


    public function __toString()
    {
        return $this->nombre;
    }
}
