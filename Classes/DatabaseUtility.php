<?php

/*
 * Copyright (C) 2019 Stefan Frömken
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

namespace In2code\T3AM\Client;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DatabaseUtility
{
    /**
     * Get column definitions from table
     * This is a alternative for TYPO3's DatabaseConnection :: admin_get_fields
     *
     * @param string $tableName
     * @return array
     */
    static public function getColumnsFromTable($tableName): array
    {
        $output = [];
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName);
        $statement = $connection->query('SHOW FULL COLUMNS FROM `' . $tableName . '`');
        while ($fieldRow = $statement->fetch()) {
            $output[$fieldRow['Field']] = $fieldRow;
        }

        return $output;
    }
}