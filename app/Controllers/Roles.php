<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Roles extends BaseController
{
	public function index()
	{
		$data = array_merge($this->data, [
			'title' 	=> 'Roles Page',
			'UserRole'	=> $this->userModel->getUserRole()
		]);
		return view('rolesList', $data);
	}
	public function userRoleAccess()
	{
		$role 		= $this->request->getGet('role');
		$userRole 	= $this->userModel->getUserRole($role);
		if (!$userRole) {
			return redirect()->to(base_url('users'));
		}
		$data = array_merge($this->data, [
			'title' 			=> 'Users Page',
			'MenuCategories'	=> $this->menuModel->getMenuCategory(),
			'Menus'				=> $this->menuModel->getMenu(),
			'Submenus'			=> $this->menuModel->getSubmenu(),
			'UserAccess'		=> $this->userModel->getAccessMenu($role),
			'role'				=> $this->userModel->getUserRole($role)
		]);
		return view('users/userAccessList', $data);
	}
}
