<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InputBudget extends BaseController
{
	public function index()
	{
		$data = array_merge($this->data, [
			'title'         => 'Input_budget'
		]);
		$group = $this->BudgetGroupModel->getAllGroup();
		$data['group'] = $group; 
		$type = $this->BudgetTypeModel->getAllType();
		$data['type'] = $type;
		$Devision = $this->DevisionModel->getAllDevision();
		$data['devision'] = $Devision; 
		$Devision2 = $this->DevisionModel->getAllDevision();
		$data['devision2'] = $Devision2; 
		$budget = $this->InputBudgetModel->getbudget();
		$data['budget'] = $budget; 
		return view('inputbudgetList', $data);
	}
	public function createBudget()
	{
		if (!$this->validate(['name' => ['rules' => 'is_unique_ignore_delete[budget_data.name]']])) {
			session()->setFlashdata('input_data', $this->request->getPost()); //เก็บข้อมูลเดิมไว้ใน session
			session()->setFlashdata('notif_error', '<b>Failed to add new Type</b> The Budget <b>name</b> already exists! ');
			return redirect()->to(base_url('InputBudget'));
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'type_id' => $this->request->getPost('type'), // Adjust to match the actual field name in your table
			'group_id' => $this->request->getPost('group'), // Adjust to match the actual field name in your table
			'repeat_id' => $this->request->getPost('ฺrepeat'), // Adjust to match the actual field name in your table
			'end' => $this->request->getPost('end'),
			'department_id' => $this->request->getPost('devision'), // Adjust to match the actual field name in your table
			'user' => $this->request->getPost('user'),
			'unit' => $this->request->getPost('unit'),
			'price' => $this->request->getPost('price'),
			'paymentmode_id' => $this->request->getPost('payment'), // Adjust to match the actual field name in your table
			'proposed' => $this->request->getPost('proposed'),
			'cost' => $this->request->getPost('cost'),
			'detail' => $this->request->getPost('detail'),
			'remark' => $this->request->getPost('remark'),
			'creater' => session('userID'), // Assuming you want to store the creator's username
		];
	
		$create = $this->InputBudgetModel->create_($data);

		if ($create) {
			session()->setFlashdata('notif_success', '<b>Successfully added new Budget</b> ');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to add new Budget</b> ');
		}
		return redirect()->to(base_url('InputBudget'));
	}


	public function updateBudget()
	{
		$updatedata = $this->request->getPost();
		$ID = $updatedata['budgetID'];
		
		// Remove the ID from the data before updating
		unset($updatedata['budgetID']);
		
		$update = $this->InputBudgetModel->update_($ID, $updatedata);

		if ($update) {
			session()->setFlashdata('notif_success', '<b>Successfully updated Budget</b>');
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to update Budget</b>');
		}

		return redirect()->to(base_url('InputBudget'));
	}


	public function delete($id)
	{
			$checkdata = $this->InputBudgetModel->getById($id);
			if ($checkdata) {
				$this->InputBudgetModel->delete_($id);
				session()->setFlashdata('notif_success', 'Budget deleted successfully.');
			} else {
				session()->setFlashdata('notif_error', 'Budget not found.');
			}
		
		return redirect()->to(base_url('InputBudget'));
	}

}
