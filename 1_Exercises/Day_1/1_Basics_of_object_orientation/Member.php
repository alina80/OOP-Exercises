<?php
//below, write code for defining class
class Member{
    private $username;
    private $password;
    public $accesLevel;

    public function __construct(string $username, string $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->accesLevel = 0;
    }

    private function generateRandomString() : string {
        $caracters = '0123456789abcdefghijklmnopqrstuvwxzABCDEFGHIJKLMNOPQRSTUVWXZ';
        $caractersLength = strlen($caracters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++){
            $randomString .= $caracters[mt_rand(0, $caractersLength - 1)];
        }
        return $randomString;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $username = $this->getUsername();
        echo "<br>The object of user $username is destructed";
    }

    public function info() : void {
        $info = "Username: " . $this->getUsername() . " password: " . $this->getPassword();
        echo "<br>";
        echo $info;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        if (is_string($username) && strlen($username) > 5 ) {
            $this->username = $username;
        }else{
            $this->username = $this->generateRandomString();
        }
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        if (is_string($password) && strlen($password) > 5 ) {
            $this->password = $password;
        }else{
            $this->password = $this->generateRandomString();
        }
    }

    /**
     * @return int
     */
    public function getAccesLevel(): int
    {
        return $this->accesLevel;
    }

    /**
     * @param int $accesLevel
     */
    public function setAccesLevel(int $accesLevel): void
    {
        $this->accesLevel = $accesLevel;
    }
}

$member1 = new Member('alina','1234');
$member1->info();
$member2 =new Member('constanta','123456');

$member2->info();