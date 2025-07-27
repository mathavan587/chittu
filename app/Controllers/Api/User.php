<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        return $this->respond(['message' => 'All users listed']);
    }

    public function show($id = null)
    {
        return $this->respond(['message' => "User ID: $id"]);
    }

    public function create()
    {
        $data = $this->request->getJSON();
        return $this->respondCreated(['message' => 'User created', 'data' => $data]);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON();
        return $this->respond(['message' => "User $id updated", 'data' => $data]);
    }

    public function delete($id = null)
    {
        return $this->respondDeleted(['message' => "User $id deleted"]);
    }
}
