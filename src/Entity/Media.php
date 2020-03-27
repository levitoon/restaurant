<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Vich\Uploadable
 */
class Media
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="nombre" )
     * @Assert\Image(
     *      allowLandscape = true,
     *      allowPortrait = true,
     *      allowSquare= true,
     *      maxSize="5M",
     *      mimeTypes={"image/jpeg", "image/gif", "image/png", "video/mp4", "video/webm", "video/avi"}
     *
     *    )
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plato", inversedBy="medias")
     */
    private $plato;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $extension;

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

    public function getPlato(): ?Plato
    {
        return $this->plato;
    }

    public function setPlato(?Plato $plato): self
    {
        $this->plato = $plato;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $image = null): void
    {
        $this->imageFile = $image;


        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if (null !== $image) {
            // if 'updatedAt' is not defined in your entity, use another property

            $this->setExtension($image->getExtension());
            $this->updatedAt = new \DateTime('now');

        }
    }
    public function __toString()
    {
        return $this->getNombre();
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

}
