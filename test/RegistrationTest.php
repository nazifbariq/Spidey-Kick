<?php
use PHPUnit\Framework\TestCase;

class RegistrationTest extends TestCase
{
    public function testSuccessfulRegistration()
    {
        // Mock the $_POST data for a successful registration
        $_POST["register"] = true;
        $_POST["username"] = "testuser";
        $_POST["email"] = "testuser@gmail.com";
        $_POST["password"] = "testpassword";

        // Include your registration logic file here
        require 'halaman_register.php';

        // Assert that the success message is present in the output
        $this->expectOutputString('User registered successfully');
    }

    public function testDuplicateEmailRegistration()
    {
        // Mock the $_POST data for a registration with a duplicate email
        $_POST["register"] = true;
        $_POST["username"] = "testuser";
        $_POST["email"] = "testuser@gmail.com";
        $_POST["password"] = "testpassword";

        // Include your registration logic file here
        require 'halaman_registrasi.php';

        // Assert that the duplicate email error message is present in the output
        $this->expectOutputString('Email already exists. Please use a different email.');
    }

    private function deleteTestUserByEmail($email)
    {
        // Implement the logic to delete a user by email from the database
        // This will depend on your database structure and implementation
    }
}
