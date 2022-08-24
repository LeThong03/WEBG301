<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Components;
use App\Http\Requests\AddCompRequest;
use App\Http\Requests\EditCompRequest;

class ComponentsController extends Controller
{
    //
    public function getComp(){
        $data['complist'] = Components::all();
        return view('backend.components',$data);
    }


    public function postComp(AddCompRequest $request){
        $components = new Components;
        $components->comp_name = $request->name;
        $components->comp_slug = str_slug($request->name);
        $components->save();
        return back();
        
    }

    public function getEditComp($id){
        $data ['comp'] = Components::find($id);
        return view('backend.editcomp',$data);
    }

    public function postEditComp(EditCompRequest $request, $id){
        $components = Components::find($id);
        $components->comp_name = $request->name;
        $components->comp_slug = str_slug($request->name);
        $components->save();
        return redirect()->intended('admin/components');
    }

    public function getDeleteComp($id){
        Components::destroy($id);
        return back();
    }
}