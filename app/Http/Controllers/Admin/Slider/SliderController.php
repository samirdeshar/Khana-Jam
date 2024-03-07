<?php

namespace App\Http\Controllers\Admin\Slider;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;
use Exception;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use Throwable;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    protected $slider;
    public function __construct__(Slider $slider)
    {
        $this->slider = $slider;

    }
    public function index()
    {
        $data = Slider::get();
        return view('admin.slider.index', compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.slider.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title'=>'required',
            'image'=>'required'
        ]);
        DB::beginTransaction();
        try{
           
            Slider::create($data);
            DB::commit();
            Toastr::success('Sucessfully Saved', "Success");
            return redirect()->back();
   

        } catch(\Throwable $th ){
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'OOps');

        }
        
      

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Slider::findorFail($id); 
        return view('admin.slider.form', compact('data'));   
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ]);
    
        DB::beginTransaction();
    
        try {
            $slider->update($request->all());
            DB::commit();
            Toastr::success('Successfully Saved', 'Success');
            return redirect()->route('slider.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning($th->getMessage(), 'Oops');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = Slider::findorFail($id);
        $data->delete();
        Toastr::success('Slider Deleted');
        return redirect()->back();

        //
    }

    public function updateStatus(Request $request,$id,$status)
    {
        $slider = Slider::findorFail($id);
        if ($slider->status == 'active') {
            $slider->status = 'inactive';
        }
        else
        {
            $slider->status = 'active';
        }
        try {
            $slider->save();
            Toastr::success('Successfully Pages Status Updated', 'Success !!!', ['positionClass'=>'toast-top-right']);
        } catch (\Throwable $th) {
            Toastr::warning('Sorry ! There Was A Problem While Updating Banner Status', 'Error !!!', ['positionClass'=>'toast-top-right']);
        }
        return back();
    }

    public function toSlider(Request $request)
    {
        if($request->selects ==null)
        {
            Toastr::warning('Error  Plz Select At Least One To Make Change !', 'Error !!!', ['positionClass'=>'toast-top-right']);

            return redirect()->route('slider.index')->with('error', 'Plz Select At Least One To Make Change');

        }
        if($request->multiple_action !='delete')
        {
            $this->slider->whereIn('id',$request->selects)->update([
                'status'=>$request->multiple_action
            ]);

            // deleteImage($this->post->image,'post/thumbnail');
            Toastr::success('Successsfully  slider Status has Been  Updated', 'Success !!!', ['positionClass'=>'toast-top-right']);
        }
        else
        {
            $this->slider->whereIn('id',$request->selects)->delete();
             Toastr::success('Successsfully  Post  has Been  Deleted', 'Success !!!', ['positionClass'=>'toast-top-right']);
        }

        return redirect()->route('slider.index')->with('success', 'Successfuly Post has updated');
    }


    public function getsliderStatus(Request $request, Slider $slider,$status)
    {
        if ($request->status !== 'all') {
            $slider = $slider->where('status', $request->status)->get();
        }
        else
        {
            $slider = $slider->orderByDesc('created_at')->get();
        }
        $data = [
            'slider'=>$slider,
            'n'=>'1',
        ];
        return redirect()->route('slider.index', $data);
    }
}
