<?php

namespace App\Entity;

use App\Repository\FarmerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FarmerRepository::class)]
class Farmer
{
    #[ORM\Id]
    #[ORM\OneToOne(inversedBy: 'farmer', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $farmer_id = null;

    public function getFarmerId(): ?Customer
    {
        return $this->farmer_id;
    }

    public function setFarmerId(Customer $farmer_id): static
    {
        $this->farmer_id = $farmer_id;

        return $this;
    }
}
