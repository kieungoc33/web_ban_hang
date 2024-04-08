<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request)
    {

       try{
        Menu::create([
            'name' =>(string) $request->input('name'),
            'parent_id' =>(int) $request->input('parent_id'),
            'description' =>(string) $request->input('description'),
            'content' =>(string) $request->input('content'),
            'active' =>(int) $request->input('active'),


        ]);
        Session::flash('success', 'Thêm danh mục thành công');

       }catch(\Exception $e){
           Session::flash('error', $e->getMessage());
           return false;
       }
         return true;
    }


}