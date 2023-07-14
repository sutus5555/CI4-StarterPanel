<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class BudgetInput extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Budget Input'
				]);
				return view('budgetinputList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Budget Input'
				]);
				return view('budgetinputForm', $data);
			}
		}
		