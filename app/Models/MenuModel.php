<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    public function getMenuCategory($menuCategoryID = false)
    {

        if ($menuCategoryID) {
            return $this->db->table('user_menu_category')->where(['id' => $menuCategoryID['id']])->get()->getRowArray();
        }
        return $this->db->table('user_menu_category')
            ->get()->getResultArray();
    }
    public function getMenu1($menuID = false)
    {
        if ($menuID) {
            return $this->db->table('user_menu')
                ->select(
                    '*,
                    user_menu_category.menu_category AS category,
                    user_menu.menu_category AS menu_category_id, 
                    user_menu.id AS menu_id
                    '
                )
                ->join('user_menu_category', 'user_menu.menu_category = user_menu_category.id')
                ->where(['id' => $menuID['menu_id']])
                ->get()->getRowArray();
        }
        return $this->db->table('user_menu')
            ->select(
                '*,
                user_menu_category.menu_category AS category,
                user_menu.menu_category AS menu_category_id, 
                user_menu.id AS menu_id
                '
            )
            ->join('user_menu_category', 'user_menu.menu_category = user_menu_category.id')
            ->get()->getResultArray();
    }

    public function getMenusByCategory($categoryId)
    {
        return $this->db->table('user_menu')
            ->where('menu_category', $categoryId)
            ->get()
            ->getResultArray();
    }

    public function getMenu($menuID = false)
    {
        if ($menuID) {
            return $this->db->table('user_menu')
                ->select(
                    '*,
                user_menu_category.menu_category AS category,
                user_menu.menu_category AS menu_category_id, 
                user_menu.id AS menu_id,
                user_access.menu_id AS access_menu_id'
                )
                ->join('user_menu_category', 'user_menu.menu_category = user_menu_category.id')
                ->join('user_access', 'user_access.menu_id = user_menu.id', 'left') // Left join to include associated user access
                ->where(['user_menu.id' => $menuID])
                ->groupBy('user_menu.id') // Group by user_menu.id
                ->get()->getRowArray();
        }
        return $this->db->table('user_menu')
            ->select(
                '*,
            user_menu_category.menu_category AS category,
            user_menu.menu_category AS menu_category_id, 
            user_menu.id AS menu_id,
            user_access.menu_id AS access_menu_id'
            )
            ->join('user_menu_category', 'user_menu.menu_category = user_menu_category.id')
            ->join('user_access', 'user_access.menu_id = user_menu.id', 'left') // Left join to include associated user access
            ->groupBy('user_menu.id') // Group by user_menu.id
            ->get()->getResultArray();
    }


    public function getSubmenu()
    {
        return $this->db->table('user_submenu')
            ->select('*,
            user_menu.title AS menu_title,
            user_submenu.menu AS menu_id,
            user_submenu.id AS submenu_id,
            user_submenu.title AS submenu_title,
            user_submenu.url AS submenu_url,

            ')
            ->join('user_menu', 'user_submenu.menu = user_menu.id')
            ->join('user_menu_category', 'user_menu.menu_category = user_menu_category.id')
            ->get()->getResultArray();
    }

    public function createMenuCategory($dataMenuCategory)
    {
        return $this->db->table('user_menu_category')->insert([
            'menu_category'        => $dataMenuCategory['inputMenuCategory']
        ]);
    }

    public function updateMenuCategory($catID, $data)
    {
        $catData = [
            'menu_category' => $data['editCatName'],
            'update_at' => date('Y-m-d H:i:s'),
            // ... other fields
        ];

        $updateResult = $this->db->table('user_menu_category')
            ->where('id', $catID)
            ->update($catData);

        return $updateResult;
    }

    public function deleteCat($id)
    {
        $builder = $this->db->table('user_menu_category');
        return $builder->delete(['id' => $id]);
    }

    public function createMenu($dataMenu)
    {
        return $this->db->table('user_menu')->insert([
            'menu_category'     => $dataMenu['inputMenuCategory2'],
            'title'             => $dataMenu['inputMenuTitle'],
            'url'               => $dataMenu['inputMenuURL'],
            'icon'              => $dataMenu['inputMenuIcon'],
            'parent'            => 0
        ]);
    }
    public function updateMenu($menuID, $data)
    {
        $menuData = [
            'title' => $data['editMenuName'],
            'menu_category' => $data['editMenuCategory'],
            'update_at' => date('Y-m-d H:i:s'),
            // ... other fields
        ];

        $updateResult = $this->db->table('user_menu')
            ->where('id', $menuID)
            ->update($menuData);

        return $updateResult;
    }


    public function deleteMenu($id)
    {
        $builder = $this->db->table('user_menu');
        return $builder->delete(['id' => $id]);
    }


    public function createSubMenu($dataSubmenu)
    {
        $this->db->transBegin();
        $this->db->table('user_submenu')->insert([
            'menu'            => $dataSubmenu['inputMenu1'],
            'title'           => $dataSubmenu['inputSubmenuTitle'],
            'url'             => $dataSubmenu['inputSubmenuURL']
        ]);
        $this->db->table('user_menu')->update(['parent' => 1], ['id' => $dataSubmenu['inputMenu']]);
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function getMenuByUrl($menuUrl)
    {
        return $this->db->table('user_menu')
            ->where(['url' => $menuUrl])
            ->get()->getRowArray();
    }
}
