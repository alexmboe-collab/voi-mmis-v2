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
 * Get Users with Search & Filters
 */
public function getAll(
    string $search = '',
    string $role = '',
    string $status = ''
): array {

    $sql = "SELECT *
            FROM users
            WHERE 1=1";

    $params = [];

    if (!empty($search)) {

        $sql .= " AND (
                    full_name LIKE :search
                    OR username LIKE :search
                  )";

        $params[':search'] = "%{$search}%";
    }

    if (!empty($role)) {

        $sql .= " AND role = :role";

        $params[':role'] = $role;
    }

    if (!empty($status)) {

        $sql .= " AND status = :status";

        $params[':status'] = $status;
    }

    $sql .= " ORDER BY full_name ASC";

    $stmt = $this->pdo->prepare($sql);

    $stmt->execute($params);

    return $stmt->fetchAll();

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