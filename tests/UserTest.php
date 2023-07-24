<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetName()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $this->assertEquals("John Doe", $user->getName());
    }

    public function testGetEmail()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $this->assertEquals("john@example.com", $user->getEmail());
    }

    public function testGetPassword()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $this->assertEquals("password123", $user->getPassword());
    }

    public function testSetName()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $user->setName("Jane Doe");
        $this->assertEquals("Jane Doe", $user->getName());
    }

    public function testSetEmail()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $user->setEmail("jane@example.com");
        $this->assertEquals("jane@example.com", $user->getEmail());
    }

    public function testSetPassword()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $user->setPassword("newpassword");
        $this->assertEquals("newpassword", $user->getPassword());
    }

    public function testUserRepositorySave()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $userRepository = new UserRepository();
        $userRepository->save($user);

        $this->assertEquals($user, $userRepository->findByEmail("john@example.com"));
    }

    public function testUserRepositoryUpdate()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $userRepository = new UserRepository();
        $userRepository->save($user);

        $user->setName("Jane Doe");
        $userRepository->update($user);

        $this->assertEquals($user, $userRepository->findByEmail("john@example.com"));
    }

    public function testUserRepositoryDelete()
    {
        $user = new User("John Doe", "john@example.com", "password123");
        $userRepository = new UserRepository();
        $userRepository->save($user);

        $userRepository->delete($user);

        $this->assertNull($userRepository->findByEmail("john@example.com"));
    }
}
