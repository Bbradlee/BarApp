<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth', ['except' => ['index','show']])
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'des')->paginate(10);
        return view('menus.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cost' => 'required',
            'drinkName' => 'required',
            'description' => 'required',
        ]);
        $menu = new Menu;
        $menu->cost = $request->input('cost');
        $menu->drinkName = $request->input('drinkName');
        $menu->description = $request->input('description');
        $menu->save();
        return redirect('/menus')->with('success', 'Drink Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menus.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menus.edit')->with('menu', $menu);
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
        $this->validate($request, [
            'cost' => 'required',
            'drinkName' => 'required',
            'description' => 'required',
        ]);
        $menu = Menu::find($id);
        $menu->cost = $request->input('cost');
        $menu->drinkName = $request->input('drinkName');
        $menu->description = $request->input('description');
        $menu->save();
        return redirect('/menus')->with('success', 'Drink Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('/menus')->with('success', 'Drink Deleted!');
    }
}
