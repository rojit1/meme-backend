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

   
    public function create()
    {
        return 'in create';
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
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
        
    }
}
