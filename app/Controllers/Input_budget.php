<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class Input_budget extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Input Budget'
				]);
				return view('input_budgetList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Input Budget'
				]);
				return view('input_budgetForm', $data);
			}
		}
		