<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::get();
        return view('shops/shops', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=200',
        ]);

        $shop=new Shop();

        $logo=$request->file('logo');
        $logoName = time().$logo->getClientOriginalName();
        $img = \Image::make($logo->getRealPath());
        $img->resize(350, 350);
        $img->save(public_path('storage/app/public'. $logoName));

        $shop->name=$request->name;
        $shop->email=$request->email;
        $shop->website=$request->website;
        $shop->logo=$logoName;
        $shop->save();
        return redirect('shops/show/'.$shop->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::where('id','=', $id)->first();
        return view('shops/show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop=Shop::where('id', $id)->first();
        return view('shops/edit',compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=200',
        ]);

        $shop=Shop::where('id', $id)->first();
        if($request->file('logo')){
            $logo=$request->file('logo');
            $logoName = time().$logo->getClientOriginalName();
            $img = \Image::make($logo->getRealPath());
            $img->resize(350, 350);
            $img->save(public_path('../storage/app/public'. $logoName));
        }else{
            $logoName = $shop->logo;
        }

        $shop->name=$request->name;
        $shop->email=$request->email;
        $shop->website=$request->website;
        $shop->logo=$logoName;
        $shop->save();
        return view('shops/show', compact('shop'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop=Shop::find($id);
        $shop->delete();
        return redirect('shops');
    }
}
