<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MessageModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Message extends BaseController
{
    public function index()
    {
        $MessageModel = new MessageModel();
        $data['messages'] = $MessageModel->findAll();   
        return view('message/index', $data);
    }
    
    public function save()
    {
        $MessageModel = new MessageModel();
        $MessageModel->insert($_POST);
        return $this->response->redirect(site_url('message/index'));
    }

    public function delete($id)
    {
        $MessageModel = new MessageModel(); 
        $MessageModel->delete($id);
        return $this->response->redirect(site_url('message/index'));
    }

    public function edit($id)
    {
        $MessageModel = new MessageModel();
        $data['message'] = $MessageModel->find($id);
        return view('message/edit', $data);
    }

    public function update()
    {
        $MessageModel = new MessageModel();
        $MessageModel->update($_POST['id'], $_POST);
        return $this->response->redirect(site_url('message/index'));
    }
}