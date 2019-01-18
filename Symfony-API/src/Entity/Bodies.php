<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bodies
 *
 * @ORM\Table(name="bodies")
 * @ORM\Entity
 */
class Bodies
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
     * @ORM\Column(name="homeBody", type="text", length=65535, nullable=false)
     */
    private $homebody;

    /**
     * @var string
     *
     * @ORM\Column(name="resumeBody", type="text", length=65535, nullable=false)
     */
    private $resumebody;

    /**
     * @var string
     *
     * @ORM\Column(name="workBody", type="text", length=65535, nullable=false)
     */
    private $workbody;

    /**
     * @var string
     *
     * @ORM\Column(name="contactBody", type="text", length=65535, nullable=false)
     */
    private $contactbody;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomebody(): ?string
    {
        return $this->homebody;
    }

    public function setHomebody(string $homebody): self
    {
        $this->homebody = $homebody;

        return $this;
    }

    public function getResumebody(): ?string
    {
        return $this->resumebody;
    }

    public function setResumebody(string $resumebody): self
    {
        $this->resumebody = $resumebody;

        return $this;
    }

    public function getWorkbody(): ?string
    {
        return $this->workbody;
    }

    public function setWorkbody(string $workbody): self
    {
        $this->workbody = $workbody;

        return $this;
    }

    public function getContactbody(): ?string
    {
        return $this->contactbody;
    }

    public function setContactbody(string $contactbody): self
    {
        $this->contactbody = $contactbody;

        return $this;
    }


}
