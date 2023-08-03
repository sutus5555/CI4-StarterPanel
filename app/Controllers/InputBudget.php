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
				return view('inputbudgetList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Input_budget'
				]);
				return view('inputbudgetForm', $data);
			}
		}
		