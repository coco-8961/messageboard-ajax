<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MessageModel;

class Messageboard extends BaseController
{

	public function index()
	{ 
		return view('messageboard/index');
	}
	public function get()
	{
		$MessageModel = new MessageModel();
        $messages = $MessageModel->findAll();   
		return json_encode($messages);
	}
	public function save()
    {
        $MessageModel = new MessageModel();
        $MessageModel->insert($_POST);
    }

    public function delete($id)
    {
        $MessageModel = new MessageModel(); 
        $MessageModel->delete($id);
    }

    public function update()
    {
        $MessageModel = new MessageModel();
        $MessageModel->update($_POST['id'], $_POST);
    }
}