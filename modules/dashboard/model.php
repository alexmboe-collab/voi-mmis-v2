<?php

/**
 * ==========================================================
 * Dashboard Model
 * Municipality of Voi MMIS
 * ==========================================================
 */

require_once __DIR__ . '/../../models/BaseModel.php';

class DashboardModel extends BaseModel
{

    /**
     * Total Users
     */
    public function totalUsers(): int
    {
        return $this->countRows('users');
    }

    /**
    * Active Users
    */
    public function activeUsers(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE status='ACTIVE'
        ";

        return (int)$this->pdo
            ->query($sql)
            ->fetchColumn();
    }

    /**
    * Inactive Users
    */
    public function inactiveUsers(): int
    {
        $sql = "
            SELECT COUNT(*)
            FROM users
            WHERE status='INACTIVE'
        ";

        return (int)$this->pdo
            ->query($sql)
            ->fetchColumn();
    }

    /**
    * Users by Role
    */
    public function usersByRole(): array
    {
        $sql = "
            SELECT
                role,
                COUNT(*) AS total
            FROM users
            GROUP BY role
            ORDER BY role
        ";

        return $this->select($sql);
    }

    /**
    * Current Logged-in User
    */
    public function currentUser(): string
    {
    return $_SESSION['full_name'] ?? 'Unknown User';
    }

    /**
    * Current User Role
    */
    public function currentRole(): string
    {
        return $_SESSION['role'] ?? 'Unknown Role';
    }

    /**
    * PHP Version
    */
    public function phpVersion(): string
    {
        return PHP_VERSION;
    }

    /**
    * Database Status
    */
    public function databaseStatus(): string
    {
        try {

            $this->pdo->query("SELECT 1");

            return "Connected";

        } catch (Exception $e) {

            return "Disconnected";

        }
    }

    /**
    * Server Time
    */
    public function serverTime(): string
    {
        return date('d M Y H:i:s');
    }

    /**
    * System Version
    */
    public function version(): string
    {
        return "2.0.0";
    }

    /**
     * Total Projects
     * (Temporary until projects table exists)
     */
    public function totalProjects(): int
    {
        return 0;
    }

    /**
     * Total Complaints
     */
    public function totalComplaints(): int
    {
        return 0;
    }

    /**
     * Total Documents
     */
    public function totalDocuments(): int
    {
        return 0;
    }

}