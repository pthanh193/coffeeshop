<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Shop;

class HomeController extends BaseController
{
	public function __construct()
	{
		if (!Guard::isUserLoggedIn()) {
			redirect('/login');
		}

		parent::__construct();
	}

	public function index()
	{
		//$shops = Shop::all();
		$recents = Shop::query()->orderBy('created_at','desc')->limit(4)->get();
		$this->renderView('home', ['shops'=>$recents]);
	}

	public function search(){
		$key = $_GET['search'];
        $result = Shop::where('name', 'like','%'.$key.'%')->get();
        $this->renderView('search',['shops'=>$result]);
    }


}
