<?php


class RegisterUser
{
    private UserPersister $userPersister;

    public function __construct(UserPersister $userPersister)
    {
        $this->userPersister = $userPersister;
    }

    public function register($user)
    {
        $this->userPersister->save($user);
    }
}
