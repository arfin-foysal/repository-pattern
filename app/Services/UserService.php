<?php
namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;

class UserService
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            throw new Exception('Failed to retrieve users: ' . $e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            throw new Exception('Failed to create user: ' . $e->getMessage());
        }
    }

    public function update(array $data, int $id)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception('Failed to update user: ' . $e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            throw new Exception('Failed to delete user: ' . $e->getMessage());
        }
    }

    public function find(int $id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $e) {
            throw new Exception('User not found: ' . $e->getMessage());
        }
    }
}
