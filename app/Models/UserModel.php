<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	public function getUser($username = false, $userID = false)
	{
		if ($username) {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->where(['username' => $username])
				->get()->getRowArray();
		} elseif ($userID) {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->where(['users.id' => $userID])
				->get()->getRowArray();
		} else {
			return $this->db->table('users')
				->select('*,users.id AS userID,user_role.id AS role_id')
				->join('user_role', 'users.role = user_role.id')
				->get()->getResultArray();
		}
	}

	public function getAccessMenuCategory($role)
	{
		return $this->db->table('user_menu_category')
			->select('*, user_menu_category.id AS menuCategoryID')
			->join('user_access', 'user_menu_category.id = user_access.menu_category_id')
			->where(['user_access.role_id' => $role])
			->orderBy('user_menu_category.arrange', 'ASC') // Replace 'your_order_field' with the actual field name
			->get()->getResultArray();
	}

	public function getAccessMenu($role)
	{
		return $this->db->table('user_menu')
			->join('user_access', 'user_menu.id = user_access.menu_id')
			->where(['user_access.role_id' => $role])
			->get()->getResultArray();
	}

	public function getUserRole($role = false)
	{
		if ($role) {
			return $this->db->table('user_role')
				->where(['id' => $role])
				->get()->getRowArray();
		}

		return $this->db->table('user_role')
			->get()->getResultArray();
	}

	public function createUser($dataUser)
	{
		return $this->db->table('users')->insert([
			'fullname'		=> $dataUser['inputFullname'],
			'username' 		=> $dataUser['inputUsername'],
			'password' 		=> password_hash($dataUser['inputPassword'], PASSWORD_DEFAULT),
			'role' 			=> $dataUser['inputRole'],
			'create_at'    => date('Y-m-d h:i:s')
		]);
	}
	public function updateUser($dataUser)
	{
		// Check if a new password is provided
		if ($dataUser['inputPassword']) {
			$password = password_hash($dataUser['inputPassword'], PASSWORD_DEFAULT);
		} else {
			// If no new password is provided, do not update the password
			$password = null;
		}

		// Build the data array for the update
		$updateData = [
			'fullname' => $dataUser['inputFullname'],
			'username' => $dataUser['inputUsername'],
			'role' => $dataUser['inputRole'],
			'update_at' => date('Y-m-d h:i:s'),
		];

		// Only update the password if a new one is provided
		if ($password !== null) {
			$updateData['password'] = $password;
		}

		// Perform the database update
		try {
			return $this->db->table('users')->update($updateData, ['id' => $dataUser['userID']]);
		} catch (\Exception $e) {
			// Log the error or handle it in an appropriate way
			return false;
		}
	}

	public function deleteUser($userID)
	{
		return $this->db->table('users')->delete(['id' => $userID]);
	}

	public function createRole($dataRole)
	{
		return $this->db->table('user_role')->insert(['role_name' => $dataRole['inputRoleName']]);
	}
	public function updateRole($dataRole)
	{
		return $this->db->table('user_role')->update(['role_name' => $dataRole['inputRoleName']], ['id' => $dataRole['roleID']]);
	}
	public function deleteRole($role)
	{
		return $this->db->table('user_role')->delete(['id' => $role]);
	}
	public function checkUserMenuCategoryAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'menu_category_id' => $dataAccess['menuCategoryID']
			])
			->countAllResults();
	}

	public function checkUserAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'menu_id' => $dataAccess['menuID']
			])
			->countAllResults();
	}

	public function checkUserSubmenuAccess($dataAccess)
	{
		return  $this->db->table('user_access')
			->where([
				'role_id' => $dataAccess['roleID'],
				'submenu_id' => $dataAccess['submenuID']
			])
			->countAllResults();
	}
	public function insertMenuCategoryPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'menu_category_id' => $dataAccess['menuCategoryID']]);
	}
	public function deleteMenuCategoryPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'menu_category_id' => $dataAccess['menuCategoryID']]);
	}

	public function insertMenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'menu_id' => $dataAccess['menuID']]);
	}
	public function deleteMenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'menu_id' => $dataAccess['menuID']]);
	}

	public function insertSubmenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->insert(['role_id' => $dataAccess['roleID'], 'submenu_id' => $dataAccess['submenuID']]);
	}
	public function deleteSubmenuPermission($dataAccess)
	{
		return $this->db->table('user_access')->delete(['role_id' => $dataAccess['roleID'], 'submenu_id' => $dataAccess['submenuID']]);
	}
}
