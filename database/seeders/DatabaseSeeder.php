<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate SQL file berdasarkan struktur database saat ini
        $this->generateSqlFile();
    }

    /**
     * Generate SQL file dari struktur database saat ini
     */
    private function generateSqlFile(): void
    {
        $sqlFilePath = base_path('docs/db_ecozense.sql');
        $tables = $this->getAllTables();
        $sql = "-- phpMyAdmin SQL Dump\n";
        $sql .= "-- version 5.2.1\n";
        $sql .= "-- https://www.phpmyadmin.net/\n";
        $sql .= "--\n";
        $sql .= "-- Host: 127.0.0.1\n";
        $sql .= "-- Generation Time: " . date('M d, Y \a\t h:i A') . "\n";
        $sql .= "-- Server version: 10.4.32-MariaDB\n";
        $sql .= "-- PHP Version: 8.2.12\n\n";

        $sql .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
        $sql .= "START TRANSACTION;\n";
        $sql .= "SET time_zone = \"+00:00\";\n\n";

        $sql .= "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n";
        $sql .= "/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n";
        $sql .= "/*!40101 SET NAMES utf8mb4 */;\n\n";

        $sql .= "--\n";
        $sql .= "-- Database: `db_ecozense`\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $sql .= "-- --------------------------------------------------------\n\n";
            $sql .= "--\n";
            $sql .= "-- Table structure for table `{$table}`\n";
            $sql .= "--\n\n";

            // Get Create Table statement
            $createTable = DB::select("SHOW CREATE TABLE `{$table}`")[0];
            $createTableSql = $createTable->{'Create Table'} ?? '';
            $sql .= "CREATE TABLE `{$table}` " . substr($createTableSql, strpos($createTableSql, '(')) . ";\n\n";
        }

        // Indexes and constraints
        $sql .= "--\n";
        $sql .= "-- Indexes for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $sql .= "--\n";
            $sql .= "-- Indexes for table `{$table}`\n";
            $sql .= "--\n";
            
            $indexes = DB::select("SHOW INDEXES FROM `{$table}`");
            $indexGroups = [];

            foreach ($indexes as $index) {
                $keyName = $index->Key_name;
                if (!isset($indexGroups[$keyName])) {
                    $indexGroups[$keyName] = [
                        'columns' => [],
                        'type' => ($keyName === 'PRIMARY') ? 'PRIMARY KEY' : 
                                 ($index->Non_unique == 0 ? 'UNIQUE KEY' : 'KEY'),
                    ];
                }
                $indexGroups[$keyName]['columns'][] = $index->Column_name;
            }

            $sql .= "ALTER TABLE `{$table}`\n";
            $indexLines = [];
            foreach ($indexGroups as $keyName => $indexInfo) {
                if ($keyName === 'PRIMARY') {
                    $indexLines[] = "  ADD PRIMARY KEY (`" . implode('`,`', $indexInfo['columns']) . "`)";
                } else {
                    $indexLines[] = "  ADD " . $indexInfo['type'] . " `{$keyName}` (`" . implode('`,`', $indexInfo['columns']) . "`)";
                }
            }
            $sql .= implode(",\n", $indexLines) . ";\n\n";
        }

        // Auto increment
        $sql .= "--\n";
        $sql .= "-- AUTO_INCREMENT for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $autoIncrement = DB::select("SHOW COLUMNS FROM `{$table}` WHERE Extra LIKE '%auto_increment%'");
            if (!empty($autoIncrement)) {
                $column = $autoIncrement[0]->Field;
                $sql .= "--\n";
                $sql .= "-- AUTO_INCREMENT for table `{$table}`\n";
                $sql .= "--\n";
                $sql .= "ALTER TABLE `{$table}`\n";
                $sql .= "  MODIFY `{$column}` " . $autoIncrement[0]->Type . " NOT NULL AUTO_INCREMENT;\n\n";
            }
        }

        // Foreign keys
        $sql .= "--\n";
        $sql .= "-- Constraints for dumped tables\n";
        $sql .= "--\n\n";

        foreach ($tables as $table) {
            // Skip Laravel's internal tables
            if (in_array($table, ['migrations', 'failed_jobs', 'personal_access_tokens'])) {
                continue;
            }

            $foreignKeys = DB::select("
                SELECT
                    CONSTRAINT_NAME,
                    COLUMN_NAME,
                    REFERENCED_TABLE_NAME,
                    REFERENCED_COLUMN_NAME
                FROM
                    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE
                    TABLE_SCHEMA = DATABASE() AND
                    TABLE_NAME = '{$table}' AND
                    REFERENCED_TABLE_NAME IS NOT NULL
            ");

            if (!empty($foreignKeys)) {
                $sql .= "--\n";
                $sql .= "-- Constraints for table `{$table}`\n";
                $sql .= "--\n";
                $sql .= "ALTER TABLE `{$table}`\n";
                $fkLines = [];
                foreach ($foreignKeys as $fk) {
                    $fkLines[] = "  ADD CONSTRAINT `{$fk->CONSTRAINT_NAME}` FOREIGN KEY (`{$fk->COLUMN_NAME}`) REFERENCES `{$fk->REFERENCED_TABLE_NAME}` (`{$fk->REFERENCED_COLUMN_NAME}`)";
                }
                $sql .= implode(",\n", $fkLines) . ";\n\n";
            }
        }

        $sql .= "COMMIT;\n\n";
        $sql .= "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n";
        $sql .= "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n";
        $sql .= "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n";

        // Ensure the docs directory exists
        if (!File::exists(base_path('docs'))) {
            File::makeDirectory(base_path('docs'), 0755, true);
        }
        
        // Save the SQL file
        File::put($sqlFilePath, $sql);
        
        echo "SQL file generated: {$sqlFilePath}\n";
    }

    /**
     * Get all tables from the database
     */
    private function getAllTables(): array
    {
        $tables = [];
        $rows = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE', 'db_ecozense');
        
        $tableNameKey = "Tables_in_{$dbName}";
        
        foreach ($rows as $row) {
            if (isset($row->$tableNameKey)) {
                $tables[] = $row->$tableNameKey;
            }
        }
        
        return $tables;
    }
}
