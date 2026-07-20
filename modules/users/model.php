<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * User Model
 *
 * Developer : Mboe Alex Mwashamba
 * ==========================================================
 */

class UserModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get all users
     */
    public function getAll(): array
    {
        $sql = "SELECT *
                FROM users
                ORDER BY full_name ASC";

        return $this->pdo->query($sql)->fetchAll();
    }

    /**
     * Count users
     */
    public function count(): int
    {
        return (int) $this->pdo
            ->query("SELECT COUNT(*) FROM users")
            ->fetchColumn();
    }

    /**
     * Find one user
     */
    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM users WHERE id=:id LIMIT 1"
        );

        $stmt->execute([
            ':id' => $id
        ]);

        $user = $stmt->fetch();

        return $user ?: null;
    }
}