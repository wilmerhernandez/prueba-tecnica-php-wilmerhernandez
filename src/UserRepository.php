<?php

class UserRepository
{
    private $users = [];

    public function save(User $user)
    {
        $this->users[$user->getEmail()] = $user;
    }

    public function update(User $user)
    {
        if (isset($this->users[$user->getEmail()])) {
            $this->users[$user->getEmail()] = $user;
        }
    }

    public function delete(User $user)
    {
        unset($this->users[$user->getEmail()]);
    }

    public function findByEmail($email)
    {
        return $this->users[$email] ?? null;
    }
}
