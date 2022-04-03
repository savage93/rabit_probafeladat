<?php

namespace Rabit\App\Model;

/**
 * This class manages the advertisements' interactions with the database.
 */
class AdvertisementModel extends Database
{
    /**
     * getAdvertisements
     * This function retrieves advertisements from the database.
     */
    public function getAdvertisements(): array
    {
        $stmt = $this->conn->query(
            'SELECT advertisements.id, advertisements.userid, users.name AS "userName", 
            advertisements.title 
            FROM advertisements, users 
            WHERE advertisements.userid = users.id'
        );

        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\Rabit\App\Model\Advertisement');
    }
}
