<?php

namespace Rabit\App\Model;

/**
 * This class handles the database connection with the MySQL backend.
 */
class Database extends Config
{
    /**
     * @var PDO conn
     *          Connection to the database
     */
    protected ?\PDO $conn = null;
    /**
     * @var PDOStatement stmt
     *                   Prepared statement / result set after fetching data
     */
    protected \PDOStatement $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opts = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
        ];
        try {
            $this->conn = new \PDO($dsn, $this->user, $this->pass, $opts);
            $this->initDatabase();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }

    public function __destruct()
    {
        $stmt = null;
        $conn = null;
    }

    /**
     * initDatabase
     * Creates the tables needed for the application if they are not present yet.
     * If the database was empty before, it also inserts some sample data for testing.
     */
    private function initDatabase(): void
    {
        $sql = <<<INIT
        CREATE TABLE IF NOT EXISTS users 
        (id INT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, PRIMARY KEY(id));
        CREATE TABLE IF NOT EXISTS advertisements 
        (id INT AUTO_INCREMENT, userid INT NOT NULL, title VARCHAR(255) NOT NULL, 
        PRIMARY KEY(id), FOREIGN KEY(userid) REFERENCES users(id));
        INIT;
        $this->conn->exec($sql);

        if ($this->conn->query('SELECT COUNT(*) FROM users')
            ->fetch(\PDO::FETCH_NUM)[0] == 0) {
            $sql = <<<TESTDATA
            INSERT INTO `users` VALUES (1,'Andy'),(2,'Barney'),(3,'Clement'),
            (4,'Daniel'),(5,'Eugene'),(6,'Finn'),(7,'Garry'),(8,'Henry'),(9,'Ian'),
            (10,'Jerry'),(11,'Kerry'),(12,'Lucy'),(13,'Molly'),(14,'Noah'),
            (15,'Oliver'),(16,'Paige'),(17,'Quentin'),(18,'Royce'),(19,'Simon'),
            (20,'Tony'),(21,'Ulrich'),(22,'Vance'),(23,'Waldo'),(24,'Xavier'),
            (25,'Ygritte'),(26,'Zoe');
            INSERT INTO `advertisements` VALUES (1,1,'It\'s free real estate!'),
            (2,2,'Click here to download free RAM!'),
            (3,3,'Congratulations you\'ve just won a new iPhone!'),
            (4,4,'Invest in DogeCoin today!'),
            (5,5,'Want to get noticed? Get into SEO today!'),
            (6,6,'Looking for a new PC? We\'ve got you covered!'),
            (7,7,'Have you ever been to the Best Korea? Book your flight today!'),
            (8,8,'Bored? Why don\'t you play some Cat Mario? :)'),
            (9,9,'Cheap alarms to secure your expensive belongings. Call now!'),
            (10,10,'You never know what the future brings, better get your life insurance ASAP!'),
            (11,11,'Try our new mango flavored lemonade, it\'s tasty!'),
            (12,12,'KaffebeanZ, when you need a coffee that really kicks you into gears!'),
            (13,13,'The brand new super duper hero series is on air now - subscribe to Kekflikz and stream now!'),
            (14,14,'Register your new domain now for 50% off!'),
            (15,15,'Try VirusTerminator today with a 60 day money-back guarantee!'),
            (16,16,'Are you tired of getting rekt in CSGO? Git gud 2day!'),
            (17,17,'You\'ve broken your phone screen again? No problem, we\'ll fix it for you!'),
            (18,18,'Are you fed up with your boss at work? Start earning money from home today!'),
            (19,19,'Download free self help eBooks now!'),
            (20,20,'Do you think you have it in you to be the top model of the future? Give us a call at 1-800-MODELS!'),
            (21,21,'Summer\'s coming! Come hit the gym with us and get that beach body that you\'ve always dreamed of!'),
            (22,22,'Goat of Duty 22 has just been released! Come join the fight in the brand new campaign! BAAAAH!'),
            (23,23,'Update to the new Doors XII operating system and experience the joy of beta testing!'),
            (24,24,'Are you interested in politics, finance and foreign policy? Subscribe to WokeNewz and stay informed!'),
            (25,25,'The new album KuulTunez from TuffReppa is already out! For tour dates visit 2ffreppa.com'),
            (26,26,'We\'re inviting all anime fans to our annual gathering in LA Super Stadium at the 4th of June! Get your tickets now!');
            TESTDATA;
            $this->conn->exec($sql);
        }
    }
}
