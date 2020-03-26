<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatoRepository")
 */
class Plato
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
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ingrediente", inversedBy="platos")
     */
    private $ingredientes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Alergeno", inversedBy="platos")
     */
    private $elergenos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Media")
     * @ORM\JoinColumn(nullable=false)
     */
    private $foto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="platos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    public function __construct()
    {
        $this->ingredientes = new ArrayCollection();
        $this->elergenos = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }


    public function removeAlergeno(Alergeno $alergeno): self
    {
        if ($this->alergenos->contains($alergeno)) {
            $this->alergenos->removeElement($alergeno);
            // set the owning side to null (unless already changed)
            if ($alergeno->getPlato() === $this) {
                $alergeno->setPlato(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ingrediente[]
     */
    public function getIngredientes(): Collection
    {
        return $this->ingredientes;
    }

    public function addIngrediente(Ingrediente $ingrediente): self
    {
        if (!$this->ingredientes->contains($ingrediente)) {
            $this->ingredientes[] = $ingrediente;
        }

        return $this;
    }

    public function removeIngrediente(Ingrediente $ingrediente): self
    {
        if ($this->ingredientes->contains($ingrediente)) {
            $this->ingredientes->removeElement($ingrediente);
        }

        return $this;
    }

    /**
     * @return Collection|Alergeno[]
     */
    public function getElergenos(): Collection
    {
        return $this->elergenos;
    }

    public function addElergeno(Alergeno $elergeno): self
    {
        if (!$this->elergenos->contains($elergeno)) {
            $this->elergenos[] = $elergeno;
        }

        return $this;
    }

    public function removeElergeno(Alergeno $elergeno): self
    {
        if ($this->elergenos->contains($elergeno)) {
            $this->elergenos->removeElement($elergeno);
        }

        return $this;
    }

    public function getFoto(): ?Media
    {
        return $this->foto;
    }

    public function setFoto(?Media $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }
}
