<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class Test1 extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Test1'
				]);
				return view('test1', $data);
			}
		}
		