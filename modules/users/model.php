<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * User Model
 *
 * Developer : Mboe Alex Mwashamba
 * Version   : 2.0.0
 * ==========================================================
 */

require_once __DIR__ . '/../../models/BaseModel.php';

class UserModel extends BaseModel
{
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
                        full_name LIKE :name
                        OR username LIKE :username
                        OR role LIKE :role_search
                        OR status LIKE :status_search
                )";

            $keyword = "%{$search}%";

            $params[':name'] = $keyword;
            $params[':username'] = $keyword;
            $params[':role_search'] = $keyword;
            $params[':status_search'] = $keyword;
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

        return $this->select($sql, $params);
    }

    /**
     * Count Users
     */
    public function count(): int
    {
        return $this->countRows('users');
    }

    /**
     * Find User by ID
     */
    public function find(int $id): ?array
    {
        return $this->selectOne(
            "SELECT *
             FROM users
             WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }
}