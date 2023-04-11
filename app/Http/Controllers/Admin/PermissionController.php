<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
class PermissionController extends Controller
{
     public $user;

	 public function __construct()
     {
         $this->middleware(function ($request, $next) {
             $this->user = Auth::guard('admin')->user();
             return $next($request);
         });
     }
    public function index()
    {
    	 if (is_null($this->user) || !$this->user->can('role.view')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }


        $pers = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();

        return view('admin.permission.index', compact('pers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	 if (is_null($this->user) || !$this->user->can('permission.view')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
        }
       
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  


    public function store(Request $request){

 if (is_null($this->user) || !$this->user->can('permission.create')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }
		

		$number=count($request->name);

        if($number >0){
            for($i=0;$i<$number;$i++){
                $data=array([
                    'name'=>$request->name[$i],
                     'guard_name'=>'admin',
                     'group_name'=>$request->group_name
                ]);
                
              Permission::insert($data);
            }

            Toastr::success('Successully Added :)' ,'Success');
        return redirect()->back();

        }
}


public function view($gname){

 if (is_null($this->user) || !$this->user->can('permission.view')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }
	$details = Permission::where('group_name',$gname)->get();
	return view('admin.permission.view',['details'=>$details]);
}

public function edit($id){

	
	 if (is_null($this->user) || !$this->user->can('permission.edit')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }

    $view = Permission::where('id',$id)->first();
	return view('admin.permission.edit',['view'=>$view]);

}
 public function update(Request $request){
 	 if (is_null($this->user) || !$this->user->can('permission.edit')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }

$id=  $request->id;


$per = Permission::find($id);
$per->name = $request->name;
$per->save();
Toastr::success('Successully Updated :)' ,'Success');
        return redirect()->route('admin.permission');

 }

 public function destroy($id)
    {
    	 if (is_null($this->user) || !$this->user->can('permission.delete')) {
             abort(403, 'Sorry !! You are Unauthorized to view any permission !');
         }
         DB::table('permissions')->where('id', '=', $id)->delete();
         Toastr::warning('Successfully Deleted :)','Success');
         return redirect()->route('admin.permission');
    }
}
