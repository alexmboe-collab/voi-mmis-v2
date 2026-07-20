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