<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BudgetGroup extends BaseController
{
	public function index()
	{
		$data = array_merge($this->data, [
			'title'         => 'BudgetGroup'
		]);
		$group = $this->BudgetGroupModel->getAllGroup();
		$data['group'] = $group; // Add data to the $data array
		return view('budgetgroupList', $data);
	}

	public function creategroup()
	{
		if (!$this->validate(['name' => ['rules' => 'is_unique[budget_group.name]']])) {
			session()->setFlashdata('input_data', $this->request->getPost()); //เก็บข้อมูลเดิมไว้ใน session
			session()->setFlashdata('notif_error', '<b>Failed to add new Group</b> The Group name already exists! ');
			return redirect()->to(base_url('BudgetGroup'));
		}
		// Get user session data
		$userSession = session()->get('username');

		$datagroup = [
			'name'       => $this->request->getPost('name'),
			'description' => $this->request->getPost('description'),
			'remark'       => $this->request->getPost('remark'),
			'creater'    => session('username'),

		];
		$creategroup = $this->BudgetGroupModel->creategroup($datagroup);

		if ($datagroup) {
			session()->setFlashdata('notif_success', '<b>Successfully added new Group</b> ');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to add new Group</b> ');
		}
		return redirect()->to(base_url('BudgetGroup'));
	}
	public function updateGroup()
	{
		$updatedata = $this->request->getPost();
		$groupID = $updatedata['groupID']; 
		$editName = $updatedata['editName'];

		// Remove the ID from the data before updating
		unset($updatedata['groupID']);

		// Define validation rules
		$validationRules = [
			'editName' => "required|is_unique[budget_group.name,{$editName}]",
			// Define other validation rules for the remaining fields
		];

		if (!$this->validate($validationRules)) {
			session()->setFlashdata('notif_error', '<b>Failed to update group already exit!</b> ' . implode(' ', $this->validator->getErrors()));
			return redirect()->to(base_url('BudgetGroup'));
		}

		$updateResult = $this->BudgetGroupModel->updateGroup($groupID, $updatedata);

		if ($updateResult) {
			session()->setFlashdata('notif_success', '<b>Successfully updated BudgetGroup</b>');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to update BudgetGroup</b>');
		}

		return redirect()->to(base_url('BudgetGroup'));
	}
	public function delete($id)
	{
		// Check if group used 
		if ($this->BudgetGroupModel->hasBudget($id)) {
			session()->setFlashdata('notif_error', 'Cannot delete BudgetGroup with associated Budget.');
		} else {
			$BudgetGroup = $this->BudgetGroupModel->getGroupById($id); 
			if ($BudgetGroup) {
				$this->BudgetGroupModel->deleteGroup($id);
				session()->setFlashdata('notif_success', 'BudgetGroup deleted successfully.');
			} else {
				session()->setFlashdata('notif_error', 'BudgetGroup not found.');
			}
		}

		return redirect()->to(base_url('BudgetGroup')); 
	}

}
