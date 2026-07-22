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
    * Get Latest Users
    */
    public function latest(int $limit = 5): array
    {
        $sql = "
            SELECT
                id,
                full_name,
                username,
                role,
                status,
                created_at
            FROM users
            ORDER BY created_at DESC
            LIMIT :limit
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
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

    /**
    * Find User or Fail
    */
    public function findOrFail(int $id): array
    {
        $user = $this->find($id);

        if ($user === null) {

            die('User not found.');

        }

        return $user;
    }

    /**
    * Check whether a username already exists
    * (optionally excluding a given user id, e.g. when editing)
    */
    public function usernameExists(string $username, ?int $excludeId = null): bool
    {
        $sql = "SELECT id
                FROM users
                WHERE username = :username";

        $params = [':username' => $username];

        if ($excludeId !== null) {
            $sql .= " AND id != :exclude_id";
            $params[':exclude_id'] = $excludeId;
        }

        $user = $this->selectOne($sql, $params);

        return $user !== null;
    }

    /**
    * Check whether an email already exists
    * (optionally excluding a given user id, e.g. when editing)
    */
    public function emailExists(string $email, ?int $excludeId = null): bool
    {
        $sql = "SELECT id
                FROM users
                WHERE email = :email";

        $params = [':email' => $email];

        if ($excludeId !== null) {
            $sql .= " AND id != :exclude_id";
            $params[':exclude_id'] = $excludeId;
        }

        $user = $this->selectOne($sql, $params);

        return $user !== null;
    }

    /**
    * Create New User
    */
    public function create(array $data): bool
    {
        return $this->execute(

            "INSERT INTO users
            (
                full_name,
                username,
               email,
               password,
               role,
                status
         )

            VALUES
         (
                :full_name,
                :username,
                :email,
                :password,
                :role,
                :status
             )",
         [

                ':full_name' => $data['full_name'],

                ':username' => $data['username'],

                ':email' => $data['email'],

                ':password' => password_hash(
                 $data['password'],
                 PASSWORD_DEFAULT
             ),

             ':role' => $data['role'],

             ':status' => $data['status']

            ]

        );
    }

    /**
    * Update Existing User
    */
    public function update(int $id, array $data): bool
    {
        return $this->execute(

            "UPDATE users
             SET
                full_name = :full_name,
                username = :username,
                email = :email,
                role = :role,
                status = :status
             WHERE id = :id",

            [
                ':full_name' => $data['full_name'],
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':role' => $data['role'],
                ':status' => $data['status'],
                ':id' => $id
            ]

        );
    }
}