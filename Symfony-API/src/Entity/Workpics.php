<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workpics
 *
 * @ORM\Table(name="workpics", indexes={@ORM\Index(name="ForeignKey_workPics_work", columns={"idWork"})})
 * @ORM\Entity
 */
class Workpics
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="text", length=65535, nullable=false)
     */
    private $picture;

    /**
     * @var \Work
     *
     * @ORM\ManyToOne(targetEntity="Work")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idWork", referencedColumnName="id")
     * })
     */
    private $idwork;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getIdwork(): ?Work
    {
        return $this->idwork;
    }

    public function setIdwork(?Work $idwork): self
    {
        $this->idwork = $idwork;

        return $this;
    }


}
