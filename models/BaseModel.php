<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * Base Model
 * ==========================================================
 *
 * Developer : Mboe Alex Mwashamba
 * Version   : 2.0.0
 * ==========================================================
 */

class BaseModel
{
    /**
     * Database connection
     */
    protected PDO $pdo;

    /**
     * Constructor
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Execute SELECT queries
     */
    protected function select(
        string $sql,
        array $params = []
    ): array {

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll();

    }

    /**
     * Execute SELECT returning one row
     */
    protected function selectOne(
        string $sql,
        array $params = []
    ): ?array {

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        $row = $stmt->fetch();

        return $row ?: null;

    }

    /**
     * Execute INSERT/UPDATE/DELETE
     */
    protected function execute(
        string $sql,
        array $params = []
    ): bool {

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);

    }

    /**
     * Count records
     */
    protected function countRows(
        string $table
    ): int {

        return (int)$this->pdo
            ->query("SELECT COUNT(*) FROM {$table}")
            ->fetchColumn();

    }
}