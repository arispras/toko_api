<?php

namespace App\Controllers;

use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class RegistrasiController extends RestfulController
{

    protected $format = 'json';
    public function registrasi()
    {

        $json = ($this->request->getJSON());
        $data = [
            'nama' => $json->nama,
            'email' => $json->email,
            'password' => password_hash(
                $json->password,
                PASSWORD_DEFAULT
            )
        ];
        // var_dump($this->request->getVar('nama'));exit();

        // $data = [
        //     'nama' =>$this->request->getVar('nama'),
        //     'email' => $this->request->getVar('email'),
        //     'password' => password_hash(
        //         $this->request->getVar('password'),
        //         PASSWORD_DEFAULT
        //     )
        // ];
        $model = new MRegistrasi();
        $model->save($data);

        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }
}
