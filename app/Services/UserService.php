<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }

    public function find(int $id)
    {
        return $this->userRepository->find($id);
    }
}
