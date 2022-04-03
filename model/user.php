<?php

namespace Rabit\App\Model;

/**
 * This class represents the user entities in the system,
 * with properties and getter-setter methods.
 */
class User
{
    /**
     * @var int id
     *          The integer used as a primary key by the database for storing this record
     */
    private ?int $id;
    /**
     * @var string name
     *             The name of this user
     */
    private string $name;
    /**
     * @var array advertisements
     *            This array holds the advertisements belonging to this user
     */
    private array $advertisements;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAdvertisements(array $advertisements): void
    {
        $this->advertisements = $advertisements;
    }

    public function getAdvertisements(): array
    {
        return $this->advertisements;
    }
}
