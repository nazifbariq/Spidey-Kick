<?php

require 'function_product.php';

class AuthenticationTest extends \PHPUnit\Framework\TestCase
{
    private $conn; 

    protected function setUp(): void
    {
        $this->conn = new mysqli("localhost:3307", "root", "", "manprorpl");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function testAuthenticationWithCorrectCredentials()
    {
        $email = "user1@gmail.com";
        $password = "pass";

        $result = authenticateUser($this->conn, $email, $password);

        $this->assertTrue($result);
    }

    public function testAuthenticationWithIncorrectCredentials()
    {
        $email = "user1@gmail.com";
        $password = "passsss";

        $result = authenticateUser($this->conn, $email, $password);

        $this->assertFalse($result);
    }

    protected function tearDown(): void
    {
        $this->conn->close();
    }

}

?>
