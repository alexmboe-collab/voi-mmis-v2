<?php

require_once __DIR__ .
'/../../models/BaseModel.php';

class ProjectModel extends BaseModel
{

    /**
     * Count Projects
     */
    public function count(): int
    {
        return $this->countRows('projects');
    }

    /**
     * Get All Projects
     */
    public function getAll(): array
    {
        return $this->select(

            "SELECT *
             FROM projects
             ORDER BY created_at DESC"

        );
    }

    /**
     * Find Project
     */
    public function find(
        int $id
    ): ?array {

        return $this->selectOne(

            "SELECT *
             FROM projects
             WHERE id = :id",

            [
                ':id' => $id
            ]

        );

    }

    /**
     * Find or Fail
     */
    public function findOrFail(
        int $id
    ): array {

        $project =
            $this->find($id);

        if (!$project) {

            die(
                "Project not found."
            );

        }

        return $project;

    }

}