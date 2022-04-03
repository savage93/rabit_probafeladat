<?php

namespace Rabit\App\Model;

/**
 * This class represents the advertisements in the system,
 * with properties and getter-setter methods.
 */
class Advertisement
{
    /**
     * @var int id
     *          The primary key for this advertisement in the database
     */
    private ?int $id;
    /**
     * @var int userId
     *          The id of the user this advertisement belongs to
     */
    private int $userId;
    /**
     * @var string userName
     *             The name of the user this advertisement belongs to
     */
    private string $userName;
    /**
     * @var string title
     *             The title of the advertisement
     */
    private string $title;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
