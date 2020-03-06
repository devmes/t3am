<?php
declare(strict_types=1);
namespace In2code\T3AM\Domain\Factory;

use In2code\T3AM\Domain\Collection\UserCollection;
use In2code\T3AM\Domain\Model\User;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UserFactory
{
    public function createBatch(array $rows): UserCollection
    {
        $users = [];
        foreach ($rows as $row) {
            $users[] = $this->create($row);
        }
        return GeneralUtility::makeInstance(UserCollection::class, $users);
    }

    public function create(array $row): User
    {
        return GeneralUtility::makeInstance(
            User::class,
            $row['uid'],
            $row['deleted'],
            $row['disable'],
            $row['starttime'],
            $row['endtime'],
            $row['username'],
            $row['avatar'],
            $row['password'],
            $row['admin'],
            $row['email'],
            $row['realName']
        );
    }
}