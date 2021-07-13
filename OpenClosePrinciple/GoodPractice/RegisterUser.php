<?php


class RegisterUser
{
    /**
     * @var array UserPersisterInterface[]
     */
    private $persisters = [];

    public function __construct(array $persisters)
    {
        $this->persisters = $persisters;
    }

    public function register($user)
    {
        foreach ($this->persisters as $persister) {
            $persister->save($user);
        }
    }
}
