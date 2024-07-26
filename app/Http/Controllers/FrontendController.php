<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopMenu;
use App\Models\SettingSlider;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\OfficeProfiles;

class FrontendController extends Controller
{
    public function index()
    {
			$menuTree = $this->getMenuTree();
			$slider = SettingSlider::orderBy('position')->get();
			$categoryNews = ArticleCategory::where('name', 'berita')->orWhere('name', 'semua')->get();
			$categoryAnnouncement = ArticleCategory::where('name', 'pengumuman')->orWhere('name', 'semua')->get();

			if ($categoryNews && $categoryAnnouncement) {
					$news = Article::whereIn('category_id', $categoryNews->pluck('id'))->get();
					$announcement = Article::whereIn('category_id', $categoryAnnouncement->pluck('id'))->get();
			} else {
					$news = collect();
					$announcement = collect();
			}

			return view('frontend.home.index', [
				'menuTree' => $menuTree,
				'slider' => $slider,
				'news' => $news,
				'announcement' => $announcement
			]);
		}

		public function showOfficeProfile($slug)
    {
			$menuTree = $this->getMenuTree();
			$office = OfficeProfiles::where('slug', $slug)->firstOrFail();

			// Mengembalikan view dengan data artikel
			return view('frontend.home.office', [
				'menuTree' => $menuTree,
				'office' => $office
			]);
    }

		private function getMenuTree() {
			$menus = TopMenu::where('status', 1)
				->orderBy('position', 'asc')
				->get();

			$menuTree = [];
			$menuMap = [];
			
			foreach ($menus as $menu) {
					$menuMap[$menu->id] = [
							'data' => $menu,
							'children' => []
					];
			}
			
			foreach ($menuMap as $id => &$menu) {
					$parentId = $menu['data']->menu_parent;
					
					if ($parentId && isset($menuMap[$parentId])) {
							$menuMap[$parentId]['children'][$id] = &$menu;
					} else {
							$menuTree[$id] = &$menu;
					}
			}
			
			unset($menu);

			return $menuTree;
		}
}
