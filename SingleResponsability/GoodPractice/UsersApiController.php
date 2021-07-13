<?php


class UsersApiController
{
    private $userRepo;

    public function __construct($userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getListForLogin(string $login)
    {
        $users = $this->userRepo->findByLogin($login);

        return new JsonResponse(JsonFormatter::format($users));
    }

    public function exportForLogin(string $login)
    {
        $users = $this->userRepo->findByLogin($login);

        CsvExporter::export($users, 'export.csv');

        return new JsonResponse(['export' => 'OK']);
    }
}
