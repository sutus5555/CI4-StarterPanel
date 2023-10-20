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
				return view('devisionList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Devision'
				]);
				return view('devisionForm', $data);
			}
		}
		