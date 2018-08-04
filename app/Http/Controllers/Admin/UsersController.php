<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as UserMod;

use App\Model\Shop as ShopMod;
use App\Model\Product as ProductMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mods = UserMod::all();/
        /*$mods = UserMod::where('active', 1)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();*/

        /*       
        $mods = UserMod::find([1, 2, 3]);

        foreach ($mods as $item) {
            echo $item->name." " .$item->surname. " " .$item->email."<br />";
        }*/
/*
        $count = UserMod::where('active', 1)->count();
        echo ;*/

        $mods = UserMod::paginate(10);
        return view('admin.user.lists', compact('mods') );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); exit;
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
        echo "save";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {/*
        echo "<br />";
        $mod = UserMod::find($id);
        echo $mod->name. " " . $mod->surname. " => is owner Shop :" .$mod->shop->name;
        echo "<br />";
        $shop = UserMod::find($id)->shop;
        echo $shop->name;*/

        /*
        $mod = ShopMod::find($id);
        echo $mod->name;

        echo "<br />";
        echo $mod->user->name;*/

        /*
        $products = ShopMod::find($id)->products;
 
        foreach ($products as $product) {
            echo $product->name;
            echo "<br />";
        }

        echo "<br />OR <br /><br />";
        $shop = ShopMod::find($id);
        echo $shop->name;
        echo "<br />";

        foreach ($shop->products as $product) {
            echo $product->name;
            echo "<br />";
        }*/

        $product = ProductMod::find($id);
        echo "Product Name is ".$product->name;
        echo "<br />";
        echo "Shop Owner is ".$product->shop->name;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $mod = UserMod::find($id);
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
        echo "update";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = UserMod::find($id);
        $mod -> delete();
        echo "delete";
    }
}
