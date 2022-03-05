<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Petugas extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data Petugas | SPP Sang Juara',
            'petugas' => $this->userModel->getUsers('petugas')->getResultArray(),
        ];

        return view('admin/petugas/index', ['data' => $data]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'Tambah Petugas | SPP Sang Juara',
        ];

        return view('admin/petugas/new', ['data' => $data]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama terlalu singkat.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username terlalu pendek.',
                    'max_length' => 'Username terlalu panjang.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $post = $this->request->getPost();
        $data = [
            'email' => $post['email'],
            'username' => $post['username'],
            'nama' => $post['nama'],
            'role' => 'petugas',
            'password_hash' => password_hash(base64_encode(hash('sha384', $post['password'], true)), PASSWORD_DEFAULT, [10]),
        ];

        $this->userModel->withGroup('petugas')->insert($data);

        return redirect()->to(base_url('/petugas'))->with('success', 'Petugas berhasil ditambah!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->userModel->delete($id);

        return redirect()->to(base_url('/petugas'))->with('success', 'Petugas berhasil dihapus!');
    }
}
