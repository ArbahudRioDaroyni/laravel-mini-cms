<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OfficeProfiles;

class OfficeProfilesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('backend.office-profiles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
			//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:50',
			'subtitle' => 'required|string|max:100',
			'address' => 'required|string',
			'address_maps_embed' => 'required|string',
			'open_date' => 'required|string',
			'close_date' => 'required|string',
			'email' => 'required|string|email|max:100',
		]);

		$response = new OfficeProfiles($request->all());
		$response->slug = Str::slug($request->title);
		$response->created_by = Auth::id();
		$response->save();

		return response()->json([
			'message' => 'Data berhasil disimpan!'
		]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$response = OfficeProfiles::find($id);

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
		$request->validate([
			'title' => 'required|string|max:50',
			'subtitle' => 'required|string|max:100',
			'address' => 'required|string',
			'address_maps_embed' => 'required|string',
			'open_date' => 'required|string',
			'close_date' => 'required|string',
			'email' => 'required|string|email|max:100',
		]);

		$response = OfficeProfiles::find($request->id);
		$response->slug = Str::slug($request->title);
		$response->created_by = Auth::id();
		$response->update($request->all());
		$response->save();

		return response()->json([
			'message' => 'Data berhasil diubah!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$response = OfficeProfiles::findOrFail($id);
		$response->status = 0;
		$response->delete();

		return response()->json(
				[
					'status' => 'success',
					'message' => 'Data berhasil dihapus (soft delete)!',
				]
		);
	}

	public function JSON()
	{
		$response = OfficeProfiles::with('createdBy')
			->with('updatedBy')
			->with('deletedBy')
			->orderBy('id', 'desc')
			->get();

		return datatables()
			->of($response)
			->addIndexColumn()
			->addColumn('actions', function ($response) {
					return [
						route('office-profiles.update', $response->id),
						route('office-profiles.destroy', $response->id),
					];
			})
			->rawColumns(['actions'])
			->make(true);
	}
}
