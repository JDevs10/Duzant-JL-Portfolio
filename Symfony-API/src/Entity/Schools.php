<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schools
 *
 * @ORM\Table(name="schools")
 * @ORM\Entity
 */
class Schools
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
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="diplomaName", type="text", length=65535, nullable=false)
     */
    private $diplomaname;

    /**
     * @var string
     *
     * @ORM\Column(name="period", type="text", length=65535, nullable=false)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", length=65535, nullable=false)
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDiplomaname(): ?string
    {
        return $this->diplomaname;
    }

    public function setDiplomaname(string $diplomaname): self
    {
        $this->diplomaname = $diplomaname;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }


}
