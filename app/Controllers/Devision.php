<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Devision extends BaseController
{
	public function index()
	{
		$data = array_merge($this->data, [
			'title'         => 'Devision'
		]);
		$Devision = $this->DevisionModel->getAllDevision();
		$data['devision'] = $Devision; // Add data to the $data array
		return view('devisionList', $data);
	}

	public function createDevision()
	{
		if (!$this->validate(['name' => ['rules' => 'is_unique_ignore_delete[department.name]']])) {
			session()->setFlashdata('input_data', $this->request->getPost()); //เก็บข้อมูลเดิมไว้ใน session
			session()->setFlashdata('notif_error', '<b>Failed to add new Type</b> The Devision <b>name</b> already exists! ');
			return redirect()->to(base_url('Devision'));
		}
		// Get user session data
		$userSession = session()->get('username');

		$data = [
			'name'       => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
			'remark'       => $this->request->getPost('remark'),
			'creater'    => session('username'),

		];
		$create = $this->DevisionModel->createDevision($data);

		if ($create) {
			session()->setFlashdata('notif_success', '<b>Successfully added new Devision</b> ');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to add new Devision</b> ');
		}
		return redirect()->to(base_url('Devision'));
	}

	public function updateDevision()
	{
		$updatedata = $this->request->getPost();
		$ID = $updatedata['DevisionID'];
		$editName = $updatedata['editName'];

		// Remove the ID from the data before updating
		unset($updatedata['DevisionID']);

		$validationRules = [
			'editName' => "required|is_unique_ignore_delete[department.name,{$ID}]",
		];

		if (!$this->validate($validationRules)) {
			session()->setFlashdata('notif_error', '<b>Failed to update Devision Code already exit!</b> ' . implode(' ', $this->validator->getErrors()));
			return redirect()->to(base_url('Devision'));
		}

		// เรียกใช้การตรวจสอบจาก model
		// if (!$this->DevisionModel->validateUniqueName($editName, $ID)) {
		// 	session()->setFlashdata('notif_error', '<b>Failed to update. Devision already exists or is deleted!</b>');
		// 	return redirect()->to(base_url('Devision'));
		// }

		$update = $this->DevisionModel->updateDevision($ID, $updatedata);

		if ($update) {
			session()->setFlashdata('notif_success', '<b>Successfully updated Devision</b>');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to update Devision</b>');
		}

		return redirect()->to(base_url('Devision'));
	}


	public function delete($id)
	{
		// Check if group used 
		if ($this->DevisionModel->hasBudget($id)) {
			session()->setFlashdata('notif_error', 'Cannot delete Devision with associated Budget.');
		} else {
			$checkdata = $this->DevisionModel->getDevisionById($id);
			if ($checkdata) {
				$this->DevisionModel->deleteDevision($id);
				session()->setFlashdata('notif_success', 'Devision deleted successfully.');
			} else {
				session()->setFlashdata('notif_error', 'Devision not found.');
			}
		}

		return redirect()->to(base_url('Devision'));
	}
}
