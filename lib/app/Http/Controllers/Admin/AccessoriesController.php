<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accessories;
use App\Http\Requests\AddAccRequest;
use App\Http\Requests\EditAccRequest;

class AccessoriesController extends Controller
{
    //
    public function getAcc(){
        $data['acclist'] = Accessories::all();
        return view('backend.accessories',$data);
    }


    public function postAcc(AddAccRequest $request){
        $accessories = new Accessories;
        $accessories->acc_name = $request->name;
        $accessories->acc_slug = str_slug($request->name);
        $accessories->save();
        return back();
    }

    public function getEditAcc($id){
        $data ['acc'] = Accessories::find($id);
        return view('backend.editacc',$data);
    }

    public function postEditAcc(EditAccRequest $request, $id){
        $accessories = Accessories::find($id);
        $accessories->acc_name = $request->name;
        $accessories->acc_slug = str_slug($request->name);
        $accessories->save();
        return redirect()->intended('admin/accessories');
    }

    public function getDeleteAcc($id){
        Accessories::destroy($id);
        return back();
    }
}