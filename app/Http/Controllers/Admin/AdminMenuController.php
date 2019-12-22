<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Menu;
class AdminMenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $menus = Menu::all();
        return view('admin.pages.menu')->with('menus',$menus);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'fieldname'=>'required',
            'url'=>'required',
            'icon'=>'required',
        ]);

        $menu = new Menu;
        $menu->fieldname = $request->fieldname;
        $menu->url = $request->url;
        $menu->icon = $request->icon;
        $menu->save();
        return redirect('/admin/layout/menu')->with('success','Menu item added succesfully');

    }

    
    public function edit($id)
    {
        return 'in edit';
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {

        Menu::destroy($id);
        return redirect()->back()->with('success','Deleted');
    }
}
