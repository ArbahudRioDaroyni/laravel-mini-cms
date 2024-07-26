<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TopMenu;

class TopMenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$menu = TopMenu::pluck('menu', 'id');

		return view('backend.topmenu.index', compact('menu'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'menu' => 'required',
			'position' => 'integer',
		]);

		$response = new TopMenu();
		$response->menu = $request->menu;
		$response->menu_parent = $request->menu_parent;
		$response->url = $request->url;
		$response->position = $request->position;
		$response->created_by = Auth::id();

		$response->save();

		return response()->json(
			[
				'status' => 'success',
				'message' => 'Data berhasil disimpan!',
			]
		);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$response = TopMenu::find($id);

		return response()->json($response);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$response = TopMenu::find($id);
		$response->menu = $request->menu;
		$response->menu_parent = $request->menu_parent;
		$response->url = $request->url;
		$response->position = $request->position;
		$response->updated_by = Auth::id();

		$response->save();

		return response()->json(
			[
				'status' => 'success',
				'message' => 'Data berhasil disimpan!',
			]
		);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$response = TopMenu::find($id);
		$response->status = 0;
		$response->deleted_at = now();
		$response->deleted_by = Auth::id();
		$response->save();

		return response()->json('Data berhasil dihapus', 200);
	}

	public function JSON()
	{
		$response = TopMenu::with('parentMenu:id,menu')
			->with('createdBy')
			->with('updatedBy')
			->with('deletedBy')
			->orderBy('id', 'desc')
			->get();

		return datatables()
			->of($response)
			->addIndexColumn()
			->addColumn('actions', function ($response) {
					return [
						route('topmenu.update', $response->id),
						route('topmenu.destroy', $response->id),
					];
			})
			->rawColumns(['actions'])
			->make(true);
	}
}
