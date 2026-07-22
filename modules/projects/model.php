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
     * Create Project
     */
    public function create(array $data): bool
    {
        return $this->execute(

            "INSERT INTO projects
            (
                project_name,
                description,
                ward,
                location,
                budget,
                funding_source,
                contractor,
                start_date,
                end_date,
                status,
                progress
            )

            VALUES
            (
                :project_name,
                :description,
                :ward,
                :location,
                :budget,
                :funding_source,
                :contractor,
                :start_date,
                :end_date,
                :status,
                :progress
            )",

            [

                ':project_name' => $data['project_name'],
                ':description' => $data['description'],
                ':ward' => $data['ward'],
                ':location' => $data['location'],
                ':budget' => $data['budget'],
                ':funding_source' => $data['funding_source'],
                ':contractor' => $data['contractor'],
                ':start_date' => $data['start_date'],
                ':end_date' => $data['end_date'],
                ':status' => $data['status'],
                ':progress' => $data['progress']

            ]

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