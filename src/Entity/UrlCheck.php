<?php

namespace App\Entity;

use App\Repository\UrlCheckRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UrlCheckRepository::class)
 * @ORM\Table(indexes={@Index(name="url_idx", columns={"url"})})
 */
class UrlCheck
{
    const NEW_STATUS = 'new';
    const PROCESSING_STATUS = 'processing';
    const DONE_STATUS = 'done';
    const ERROR_STATUS = 'error';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Unique
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $status = self::NEW_STATUS;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $httpCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getHttpCode(): ?int
    {
        return $this->httpCode;
    }

    public function setHttpCode(?int $httpCode): self
    {
        $this->httpCode = $httpCode;

        return $this;
    }

}
