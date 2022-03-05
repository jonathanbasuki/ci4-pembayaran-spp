<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SPP extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data SPP | SPP Sang Juara',
            'spp' => $this->sppModel->findAll(),
        ];

        return view('admin/spp/index', ['data' => $data]);
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
            'title' => 'Tambah SPP | SPP Sang Juara',
        ];

        return view('admin/spp/new', ['data' => $data]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus diisi.',
                ]
            ],
            'nominal' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'numeric' => 'Nominal tidak valid.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->sppModel->insert([
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to(base_url('/spp'))->with('success', 'SPP berhasil ditambah!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit SPP | SPP Sang Juara',
            'spp' => $this->sppModel->find($id),
        ];

        return view('admin/spp/edit', ['data' => $data]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun harus diisi.',
                ]
            ],
            'nominal' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'numeric' => 'Nominal tidak valid.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->sppModel->where('id', $id)->set([
            'tahun' => $this->request->getPost('tahun'),
            'nominal' => $this->request->getPost('nominal'),
        ])->update();

        return redirect()->to(base_url('/spp'))->with('success', 'SPP berhasil ditambah!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
