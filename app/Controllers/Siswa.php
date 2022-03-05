<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Siswa extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data Siswa | SPP Sang Juara',
            'siswa' => $this->siswaModel->getSiswa()->getResultArray(),
        ];

        return view('admin/siswa/index', ['data' => $data]);
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
            'title' => 'Tambah Siswa | SPP Sang Juara',
            'kelas' => $this->kelasModel->findAll(),
            'spp' => $this->sppModel->findAll(),
        ];

        return view('admin/siswa/new', ['data' => $data]);
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
                    'required' => 'Nama siswa harus diisi.',
                    'min_length' => 'Nama siswa terlalu pendek.',
                ]
            ],
            'nisn' => [
                'rules' => 'required|numeric|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => 'NISN siswa harus diisi.',
                    'numeric' => 'NISN siswa tidak valid.',
                    'is_unique' => 'NISN sudah terdaftar.',
                ]
            ],
            'nis' => [
                'rules' => 'required|numeric|is_unique[siswa.nis]',
                'errors' => [
                    'required' => 'NIS siswa harus diisi.',
                    'numeric' => 'NIS siswa tidak valid.',
                    'is_unique' => 'NIS sudah terdaftar.',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas harus diisi.',
                ]
            ],
            'spp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun pelajaran harus diisi.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('nisn'),
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'password_hash' => password_hash(base64_encode(hash('sha384', $this->request->getPost('nis'), true)), PASSWORD_DEFAULT, [10]),
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->userModel->insertUser($data);

        $data = $this->request->getPost();
        
        $this->siswaModel->insert([
            'nisn' => $data['nisn'],
            'nis' => $data['nis'],
            'id_kelas' => $data['kelas'],
            'id_spp' => $data['spp'],
        ]);


        return redirect()->to(base_url('/siswa'))->with('success', 'Data siswa berhasil ditambah!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Siswa | SPP Sang Juara',
            'siswa' => $this->siswaModel->find($id),
            'kelas' => $this->kelasModel->findAll(),
            'spp' => $this->sppModel->findAll(),
        ];

        return view('admin/siswa/edit', ['data' => $data]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'nis' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIS siswa harus diisi.',
                    'numeric' => 'NIS siswa tidak valid.',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas harus diisi.',
                ]
            ],
            'spp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun pelajaran harus diisi.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        $this->siswaModel->where('nisn', $id)->set([
            'nis' => $data['nis'],
            'alamat' => $data['alamat'],
            'telp' => $data['telp'],
            'id_kelas' => $data['kelas'],
            'id_spp' => $data['spp'],
        ])->update();

        return redirect()->to(base_url('/siswa'))->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->siswaModel->delete($id);
        $this->userModel->deleteUser($id);

        return redirect()->to(base_url('/siswa'))->with('success', 'Data siswa berhasil dihapus!');
    }
}
