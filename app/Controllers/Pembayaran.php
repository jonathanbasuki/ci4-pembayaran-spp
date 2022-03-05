<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Pembayaran extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Tagihan | SPP Sang Juara',
            'tagihan' => $this->pembayaranModel->getPembayaran(null, 'Belum Lunas')->getResultArray(),
        ];

        return view('admin/pembayaran/index', ['data' => $data]);
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
            'title' => 'Tambah Tagihan | SPP Sang Juara',
            'siswa' => $this->pembayaranModel->setTagihan()->getResultArray(),
        ];

        return view('admin/pembayaran/new', ['data' => $data]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'nisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NISN belum dipilih.'
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $post = $this->request->getPost();
        $data = $this->pembayaranModel->getTagihan($post['nisn'])->getResultArray();

        foreach ($data as $row) {
            $this->pembayaranModel->insert([
                'nisn' => $row['nisn'],
                'tanggal' => date('Y-m-d H:i:s'),
                'id_spp' => $row['id_spp'],
            ]);
        }

        $this->siswaModel->where('nisn', $post['nisn'])->set([
            'tagihan' => '1',
        ])->update();

        return redirect()->to(base_url('/pembayaran'))->with('success', 'Tagihan SPP berhasil dibuat!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Tagihan | SPP Sang Juara',
            'tagihan' => $this->pembayaranModel->editTagihan($id)->getResultArray(),
        ];

        return view('admin/pembayaran/edit', ['data' => $data]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status pembayaran harus dipilih.',
                ]
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $tagihan = $this->pembayaranModel->find($id);

        if ($data['status'] == 'Belum Lunas') {
            $tanggal = $data['tanggal'];
        } else if ($data['status'] == 'Lunas') {
            $tanggal = date('Y-m-d H:i:s');

            $this->siswaModel->where('nisn', $tagihan['nisn'])->set([
                'tagihan' => '0',
            ])->update();
        }

        $this->pembayaranModel->where('id', $id)->set([
            'tanggal' => $tanggal,
            'status' => $data['status'],
        ])->update();

        return redirect()->to(base_url('/pembayaran'))->with('success', 'Tagihan SPP berhasil diubah!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {   
        $tagihan = $this->pembayaranModel->find($id);

        $this->pembayaranModel->delete($id);
        $this->siswaModel->where('nisn', $tagihan['nisn'])->set([
            'tagihan' => '0',
        ])->update();

        return redirect()->to(base_url('/pembayaran'))->with('success', 'Tagihan SPP berhasil dihapus!');
    }
}
