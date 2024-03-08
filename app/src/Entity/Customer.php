<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Customer implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_name = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_type = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_email = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_password = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_contact = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_city = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_address = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_address_num = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_cep = null;

    #[ORM\Column(length: 255)]
    private ?string $customer_language = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $customer_img_path = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $customer_dt_inserted = null;

    #[ORM\OneToOne(mappedBy: 'farmer_id', cascade: ['persist', 'remove'])]
    private ?Farmer $farmer = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerName(): ?string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name): static
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getCustomerType(): ?string
    {
        return $this->customer_type;
    }

    public function setCustomerType(string $customer_type): static
    {
        $this->customer_type = $customer_type;

        return $this;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }

    public function setCustomerEmail(string $customer_email): static
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    public function getCustomerPassword(): ?string
    {
        return $this->customer_password;
    }

    public function setCustomerPassword(string $customer_password): static
    {
        $this->customer_password = $customer_password;

        return $this;
    }

    public function getCustomerContact(): ?string
    {
        return $this->customer_contact;
    }

    public function setCustomerContact(string $customer_contact): static
    {
        $this->customer_contact = $customer_contact;

        return $this;
    }

    public function getCustomerCity(): ?string
    {
        return $this->customer_city;
    }

    public function setCustomerCity(string $customer_city): static
    {
        $this->customer_city = $customer_city;

        return $this;
    }

    public function getCustomerAddress(): ?string
    {
        return $this->customer_address;
    }

    public function setCustomerAddress(string $customer_address): static
    {
        $this->customer_address = $customer_address;

        return $this;
    }

    public function getCustomerAddressNum(): ?string
    {
        return $this->customer_address_num;
    }

    public function setCustomerAddressNum(string $customer_address_num): static
    {
        $this->customer_address_num = $customer_address_num;

        return $this;
    }

    public function getCustomerCep(): ?string
    {
        return $this->customer_cep;
    }

    public function setCustomerCep(string $customer_cep): static
    {
        $this->customer_cep = $customer_cep;

        return $this;
    }

    public function getCustomerLanguage(): ?string
    {
        return $this->customer_language;
    }

    public function setCustomerLanguage(string $customer_language): static
    {
        $this->customer_language = $customer_language;

        return $this;
    }

    public function getCustomerImgPath(): ?string
    {
        return $this->customer_img_path;
    }

    public function setCustomerImgPath(?string $customer_img_path): static
    {
        $this->customer_img_path = $customer_img_path;

        return $this;
    }

    public function getCustomerDtInserted(): ?\DateTimeInterface
    {
        return $this->customer_dt_inserted;
    }

    public function setCustomerDtInserted(\DateTimeInterface $customer_dt_inserted): static
    {
        $this->customer_dt_inserted = $customer_dt_inserted;

        return $this;
    }

    public function getFarmer(): ?Farmer
    {
        return $this->farmer;
    }

    public function setFarmer(Farmer $farmer): static
    {
        // set the owning side of the relation if necessary
        if ($farmer->getFarmerId() !== $this) {
            $farmer->setFarmerId($this);
        }

        $this->farmer = $farmer;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->getCustomerPassword();
    }
    public function hydrateInformation(): array
    {
        return [
            "id" => $this->id,
            "customer_name" => $this->customer_name,
            "customer_email" => $this->customer_email
        ];
    }
}
