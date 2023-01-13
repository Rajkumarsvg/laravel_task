<?php

namespace App\Http\Controllers;

use App\Models\user_detail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_detail = user_detail::get();
        return view('home')->with('user_detail',$user_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'description' => 'required', 
         ]);

        $image_name = [];

        foreach ($request->file('image') as $key => $value) {
            $name = $request->file('image')[$key]->getClientOriginalName();
            $request->file('image')[$key]->storeAs('public/images/',$name );
            $image_name[] = $name;
            
        }
        $user_detail              = new user_detail;
        $user_detail->name        = $request->name;
        $user_detail->email_id    = $request->email;
        $user_detail->mobile_no   = $request->mobile;
        $user_detail->description = $request->description;
        $user_detail->image       = implode( ',',$image_name);
        $user_detail->save();
         
       
        return  response()->json([   
            "status" => '1' ,  
            "msg"    => 'success'  

          ]); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_detail  $user_detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_detail    = user_detail::where('id',$id)->first();
        $image          = explode(',',$user_detail->image); 
        $data           = [
                            'id'          => $user_detail->id,
                            'name'        => $user_detail->name,
                            'email_id'    => $user_detail->email_id,
                            'mobile_no'   => $user_detail->mobile_no,
                            'description' => $user_detail->description,
                            'image'       => $image,
                            'type'        => 'view',
                          ];
          
        return view('view')->with('user_detail',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_detail  $user_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(user_detail $user_detail)
    {
        //
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_detail  $user_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_detail $user_detail)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_detail  $user_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_detail $user_detail)
    {
        //
    }
    public function download($id)
    {
        $user_detail = user_detail::where('id',$id)->first();
        $image       = explode(',',$user_detail->image); 
       $data         = [
                        'id'          => $user_detail->id,
                        'name'        => $user_detail->name,
                        'email_id'    => $user_detail->email_id,
                        'mobile_no'   => $user_detail->mobile_no,
                        'description' => $user_detail->description,
                        'image'       => $image,
                        'type'        => 'download',
                        ];
     
        $pdf         = Pdf::loadView('view', ['user_detail' => $data])->setOptions(['defaultFont' => 'sans-serif','isPhpEnabled'=> true]);
         
        $file_name   =  'report.pdf';
        return $pdf->stream($file_name);
 


    }

}
