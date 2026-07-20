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

    /**
    * Check whether a username already exists
    */
    public function usernameExists(string $username): bool
    {
        $user = $this->selectOne(
            "SELECT id
            FROM users
            WHERE username = :username",
            [
                ':username' => $username
            ]
        );

        return $user !== null;
    }

    /**
    * Check whether an email already exists
    */
    public function emailExists(string $email): bool
    {
        $user = $this->selectOne(
            "SELECT id
            FROM users
            WHERE email = :email",
            [
                ':email' => $email
            ]
        );

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
}