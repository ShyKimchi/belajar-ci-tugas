<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
        helper(['form']);
    }

    public function index()
    {
        // Hanya admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $data['diskon'] = $this->diskon->findAll();
        return view('diskon/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        return view('diskon/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskon->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'nominal' => $this->request->getVar('nominal')
        ]);

        return redirect()->to('/diskon');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $data['diskon'] = $this->diskon->find($id);
        return view('diskon/edit', $data);
    }

        public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $rules = [
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $tanggal = $this->request->getVar('tanggal'); // ambil dari input
        $nominal = $this->request->getVar('nominal');

        $this->diskon->update($id, [
            'nominal' => $nominal
        ]);

        // 🔁 Update session jika tanggal == hari ini
        if ($tanggal == date('Y-m-d')) {
            session()->set('diskon', $nominal);
        }

        return redirect()->to('/diskon');
    }



    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        $this->diskon->delete($id);
        return redirect()->to('/diskon');
    }
}
