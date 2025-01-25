<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentRepository::class)]
class Rent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $vehicle_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $driver_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $cost_total = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_allowed_zone_left = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location_start = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location_end = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_active = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $finished_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleId(): ?int
    {
        return $this->vehicle_id;
    }

    public function setVehicleId(?int $vehicle_id): static
    {
        $this->vehicle_id = $vehicle_id;

        return $this;
    }

    public function getDriverId(): ?int
    {
        return $this->driver_id;
    }

    public function setDriverId(?int $driver_id): static
    {
        $this->driver_id = $driver_id;

        return $this;
    }

    public function getCostTotal(): ?string
    {
        return $this->cost_total;
    }

    public function setCostTotal(?string $cost_total): static
    {
        $this->cost_total = $cost_total;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isAllowedZoneLeft(): ?bool
    {
        return $this->is_allowed_zone_left;
    }

    public function setIsAllowedZoneLeft(?bool $is_allowed_zone_left): static
    {
        $this->is_allowed_zone_left = $is_allowed_zone_left;

        return $this;
    }

    public function getLocationStart(): ?string
    {
        return $this->location_start;
    }

    public function setLocationStart(?string $location_start): static
    {
        $this->location_start = $location_start;

        return $this;
    }

    public function getLocationEnd(): ?string
    {
        return $this->location_end;
    }

    public function setLocationEnd(?string $location_end): static
    {
        $this->location_end = $location_end;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(?bool $is_active): static
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeImmutable
    {
        return $this->finished_at;
    }

    public function setFinishedAt(?\DateTimeImmutable $finished_at): static
    {
        $this->finished_at = $finished_at;

        return $this;
    }
}
