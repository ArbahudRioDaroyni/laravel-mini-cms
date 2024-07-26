<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleCategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('backend.article-categories.index');
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
			'name' => 'required|string|max:255',
			'status' => 'boolean|nullable'
		]);

		$category = new ArticleCategory($request->all());
		$category->created_by = Auth::id();
		$category->save();

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
		$response = ArticleCategory::find($id);

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
			'name' => 'required|string|max:255',
			'status' => 'boolean|nullable'
		]);

		$category = ArticleCategory::find($id);
		$category->update($request->all());
		$category->updated_by = Auth::id();
		$category->save();

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
		$response = ArticleCategory::find($id);
		$response->status = 0;
		$response->deleted_at = now();
		$response->deleted_by = Auth::id();
		$response->save();

		return response()->json('Data berhasil dihapus', 200);
	}

	public function JSON()
	{
		$response = ArticleCategory::with('createdBy')
			->with('updatedBy')
			->with('deletedBy')
			->orderBy('id', 'desc')
			->get();

		return datatables()
			->of($response)
			->addIndexColumn()
			->addColumn('actions', function ($response) {
				return [
					route('article-categories.update', $response->id),
					route('article-categories.destroy', $response->id),
				];
			})
			->rawColumns(['actions'])
			->make(true);
	}
}