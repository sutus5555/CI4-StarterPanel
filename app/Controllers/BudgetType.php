<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class BudgetType extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'BudgetType'
				]);
				$type = $this->BudgetTypeModel->getAllType();
				$data['type'] = $type; // Add data to the $data array
				return view('budgettypeList', $data);
			}
		
			public function createtype()
			{
				if (!$this->validate(['name' => ['rules' => 'is_unique[budget_type.name]']])) {
					session()->setFlashdata('input_data', $this->request->getPost()); //เก็บข้อมูลเดิมไว้ใน session
					session()->setFlashdata('notif_error', '<b>Failed to add new Type</b> The BudgetType <b>name</b> already exists! ');
					return redirect()->to(base_url('BudgetType'));
				}
				// Get user session data
				$userSession = session()->get('username');
		
				$data = [
					'name'       => $this->request->getPost('name'),
					'description' => $this->request->getPost('description'),
					'remark'       => $this->request->getPost('remark'),
					'creater'    => session('username'),
		
				];
				$create = $this->BudgetTypeModel->createtype($data);
		
				if ($create) {
					session()->setFlashdata('notif_success', '<b>Successfully added new BudgetType</b> ');
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to add new BudgetType</b> ');
				}
				return redirect()->to(base_url('BudgetType'));
			}

			public function updateType()
			{
				$updatedata = $this->request->getPost();
				$ID = $updatedata['typeID']; 
				$editName = $updatedata['editName'];
		
				// Remove the ID from the data before updating
				unset($updatedata['typeID']);
		
				// Define validation rules
				$validationRules = [
					'editName' => "required|is_unique[budget_type.name,{$editName}]",
					// Define other validation rules for the remaining fields
				];
		
				if (!$this->validate($validationRules)) {
					session()->setFlashdata('notif_error', '<b>Failed to update BudgetType already exit!</b> ' . implode(' ', $this->validator->getErrors()));
					return redirect()->to(base_url('BudgetType'));
				}
		
				$update = $this->BudgetTypeModel->updateType($ID, $updatedata);
		
				if ($update) {
					session()->setFlashdata('notif_success', '<b>Successfully updated BudgetType</b>');
				} else {
					session()->setFlashdata('notif_error', '<b>Failed to update BudgetType</b>');
				}
		
				return redirect()->to(base_url('BudgetType'));
			}


			public function delete($id)
			{
				// Check if group used 
				if ($this->BudgetTypeModel->hasBudget($id)) {
					session()->setFlashdata('notif_error', 'Cannot delete BudgetType with associated Budget.');
				} else {
					$checkdata = $this->BudgetTypeModel->getTypeById($id); 
					if ($checkdata) {
						$this->BudgetTypeModel->deleteType($id);
						session()->setFlashdata('notif_success', 'BudgetType deleted successfully.');
					} else {
						session()->setFlashdata('notif_error', 'BudgetType not found.');
					}
				}
		
				return redirect()->to(base_url('BudgetType')); 
			}
		
		}
		
		