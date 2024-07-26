<?php

namespace App\Http\Controllers;

use App\Models\SettingSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingSliderController extends Controller
{
		/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('backend.setting-slider.index');
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
			'headline' => 'required|string',
			'body' => 'required',
			'text-left-cta' => 'string|nullable|max:100',
			'url-left-cta' => 'string|nullable',
			'text-right-cta' => 'string|nullable|max:100',
			'url-right-cta' => 'string|nullable',
			'position' => 'integer',
			'status' => 'boolean|nullable',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$response = new SettingSlider($request->all());
		$response->created_by = Auth::id();
		if ($request->hasFile('image')) {
			$imageName = $request->image->extension().'_'.time().'_'.$request->image->getClientOriginalName();
			$request->image->move(public_path('images'), $imageName);
			$response->image = $imageName; 
		}
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
		$response = SettingSlider::find($id);

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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$response = SettingSlider::find($id);
		$response->status = 0;
		$response->deleted_at = now();
		$response->deleted_by = Auth::id();
		$response->save();

		return response()->json('Data berhasil dihapus', 200);
	}
	
	public function JSON()
	{
		$response = SettingSlider::with('createdBy')
			->with('updatedBy')
			->with('deletedBy')
			->orderBy('id', 'desc')
			->get();

		return datatables()
			->of($response)
			->addIndexColumn()
			->addColumn('actions', function ($response) {
				return [
					route('setting-slider.update', $response->id),
					route('setting-slider.destroy', $response->id),
				];
			})
			->rawColumns(['actions'])
			->make(true);
	}

	public function customUpdate(Request $request)
	{
		$request->validate([
			'headline' => 'required|string',
			'body' => 'required',
			'text-left-cta' => 'string|nullable|max:100',
			'url-left-cta' => 'string|nullable',
			'text-right-cta' => 'string|nullable|max:100',
			'url-right-cta' => 'string|nullable',
			'position' => 'integer',
			'status' => 'boolean|nullable',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$response = SettingSlider::find($request->id);
		$response->created_by = Auth::id();
		if ($request->hasFile('image')) {
			if ($response->image && file_exists(public_path('images') . '/' . $response->image)) {
				unlink(public_path('images') . '/' . $response->image);
			}
		}
		$response->update($request->all());
		if ($request->hasFile('image')) {			
			$imageName = $request->image->extension().'_'.time().'_'.$request->image->getClientOriginalName();
			$request->image->move(public_path('images'), $imageName);
			$response->image = $imageName; 
		}
		$response->save();

		return response()->json([
			'message' => 'Data berhasil disimpan!'
		]);
	}
}
