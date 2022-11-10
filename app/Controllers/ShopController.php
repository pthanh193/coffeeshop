<?php

namespace App\Controllers;

use App\Models\District;
use App\Models\Shop;
use App\SessionGuard as Guard;
use Illuminate\Contracts\Pagination\Paginator;

class ShopController extends BaseController
{
    public function __construct()
	{
		if (!Guard::isUserLoggedIn()) {
			redirect('/login');
		}

		parent::__construct();
	}

    protected function filterShopData(array $data){
        return [
            'id_district' => $data['id_district'] ?? null,
            'name' => $data['name'] ?? null,
            'address' => $data['address'] ?? null,
            'price' => $data['price'] ?? null,
            'openingtime' => $data['openingtime'] ?? null,
            'description' => $data['description'] ?? null,     
        ];
    }

    public function index(){
        $shops =  Shop::all();
        $districts = District::all();
        $this->renderView('allshops', [
            'districts' => $districts,
            'shops' => $shops
            ]);
            
    }

    public function showAddPage(){
        $this->renderView('createshop', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues(),
            'districts' => District::all()
        ]);
    }

    public function create(){
        $shop = new Shop();
        $data = $this->filterShopData($_POST);
        $model_errors = Shop::validate($data);
        if(!empty($_FILES['image1']['name'])){
            $target_dir = "upload/";
            $file = $_FILES['image1']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['image1']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
            $shop->image1 =  $path_filename_ext;
        } 
        if(!empty($_FILES['image2']['name'])){
            $target_dir = "upload/";
            $file = $_FILES['image2']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['image2']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
            $shop->image2 =  $path_filename_ext;
        } 
        if (empty($model_errors)) {
            $shop->fill($data);
            $shop->save();
            redirect('/coffeeshops');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/create_shop', ['errors' => $model_errors]);
    }
    
    public function showEditPage($id)
    {
        $shop = Shop::find($id);
        if (! $shop) {
            $this->pageNotFound();
        }
        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'img1' => session_get_once('img1'),
            'img2' => session_get_once('img2'),
            'districts' => District::all(),
            'id_dt' => $shop->district->id,
            'name_dt' => $shop->district->name,
            'id_shop' => $shop->id,
            'shop' => ( !empty($form_values) ) ? array_merge($form_values, ['id' => $shop->id]) : $shop->toArray()
        ];
        $this->renderView('editshop', $data);
    }
    
    public function edit($id)
    {
        
        $shop = Shop::find($id);   
        if (!$shop) {
            $this->pageNotFound();
        }
        $oldfile1 = $shop->image1;
        $oldfile2 = $shop->image2;
        if(!empty($_FILES['image1']['name'])){
            $target_dir = "upload/";
            $file = $_FILES['image1']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['image1']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
            $shop->image1 =  $path_filename_ext;
        }else{
            $shop->image1 = $oldfile1;
        }
        if(!empty($_FILES['image2']['name'])){
            $target_dir = "upload/";
            $file = $_FILES['image2']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['image2']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
            $shop->image2 = $path_filename_ext;
        }else {
            $shop->image2 = $oldfile2;
        }
        $data = $this->filterShopData($_POST);
        $model_errors = Shop::validateUpdate($data);
        if (empty($model_errors)) {
            $shop->fill($data);
            $shop->save();
            redirect('/coffeeshops');
        }
        $this->saveFormValues($_POST);
        redirect('/edit_shop/'.$id, ['errors' => $model_errors, 'img1'=>$oldfile1, 'img2' => $oldfile2]);
    }

    public function delete($id)
    {
        $shop = Shop::find($id);
        // if (! $shop) {
        //     $this->pageNotFound();
        // }
        $shop->delete();
        redirect('/coffeeshops');
    }

    public function showDetailPage($id)
    {
        $shop = Shop::find($id);
        $shops = Shop::query()->inRandomOrder()->limit(4)->get();

        if (! $shop) {
            $this->pageNotFound();
        }
        
        $this->renderView('detail', [
            'shopdt' => $shop,
            'shops' => $shops
        ]);
    }  
    
    public function filterByDt($id){
        $district = District::find($id);
        $shops = Shop::where('id_district', $district->id)->get();
        $this->renderView('filtershop',[
            'districts' => District::all(),
            'dt' =>$district,
            'shops' => $shops
        ]);
    }

   
}