<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Kelas extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data Kelas | SPP Sang Juara',
            'kelas' => $this->kelasModel->findAll(),
        ];

        return view('admin/kelas/index', ['data' => $data]);
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
            'title' => 'Tambah Kelas | SPP Sang Juara',
        ];

        return view('admin/kelas/new', ['data' => $data]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas belum dipilih.',
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan belum dipilih.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kelasModel->insert([
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
        ]);

        return redirect()->to(base_url('/kelas'))->with('success', 'Kelas berhasil ditambah!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Tambah Kelas | SPP Sang Juara',
            'kelas' => $this->kelasModel->find($id),
        ];

        return view('admin/kelas/edit', ['data' => $data]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas belum dipilih.',
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan belum dipilih.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kelasModel->where('id', $id)->set([
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
        ])->update();

        return redirect()->to(base_url('/kelas'))->with('success', 'Kelas berhasil diubah!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->kelasModel->delete($id);
        
        return redirect()->to(base_url('/kelas'))->with('success', 'Kelas berhasil dihapus!');
    }
}
