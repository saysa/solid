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
}
