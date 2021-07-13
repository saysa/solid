<?php


class UserRepository extends EntityRepository
{
    public function findByLogin(string $login)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.login = :val')
            ->setParameter('val', $login)
            ->getQuery()
            ->getResult();
    }

    public function findByLoginToJson(string $login)
    {
        $items = $this->findByLogin($login);

        return json_encode($items);
    }

    public function findByLoginToCSV(string $login)
    {
        $items = $this->findByLogin($login);
        $csvPath = 'path/to/export_user.csv';
        $csvHandle = fopen($csvPath, 'w');

        foreach ($items as $record) {
            $data = $record->toArray(false);
            fputcsv($csvHandle, $data);
        }

        fclose($csvHandle);
    }
}
