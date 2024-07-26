<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
		/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = ArticleCategory::all()->mapWithKeys(function ($x) {
			return [$x->id => $x->name];
		});
		
		return view('backend.articles.index', compact('data'));
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
			'title' => 'required|string|max:255',
			'body' => 'required',
			'url' => 'string|nullable',
			'status' => 'boolean|nullable',
			'category_id' => 'exists:article_categories,id|nullable',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$response = new Article($request->all());
		$response->created_by = Auth::id();
		if ($request->hasFile('image')) {
			$imageName = $request->image->extension().'_'.time().'_'.$request->image->getClientOriginalName();
			$request->image->move(public_path('images'), $imageName);
			$response->image = $imageName; 
		}
		$response->save();

		return response()->json(
			[
				'file_get_contents' => file_get_contents('php://input'),
				'message' => 'Data berhasil disimpan!',
				'data' => json_encode($_POST),
				'request' => $request,
				'image' => $request->image,
			]
		);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$response = Article::find($id);

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
		$response = Article::find($id);
		$response->status = 0;
		$response->deleted_at = now();
		$response->deleted_by = Auth::id();
		$response->save();

		return response()->json('Data berhasil dihapus', 200);
	}
	
	public function JSON()
	{
		$response = Article::with('createdBy')
			->with('updatedBy')
			->with('deletedBy')
			->with('category')
			->orderBy('id', 'desc')
			->get();

		return datatables()
			->of($response)
			->addIndexColumn()
			->addColumn('actions', function ($response) {
				return [
					route('articles.update', $response->id),
					route('articles.destroy', $response->id),
				];
			})
			->rawColumns(['actions'])
			->rawColumns(['aksi'])
			->make(true);
	}

	public function customUpdate(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'body' => 'required',
			'url' => 'string|nullable',
			'status' => 'boolean|nullable',
			'category_id' => 'exists:article_categories,id|nullable',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$response = Article::find($request->id);
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

		return response()->json(
			[
				// 'file_get_contents' => file_get_contents('php://input'),
				'message' => 'Data berhasil disimpan!',
				// 'data' => $data,
				// 'request' => $request,
				// 'requestData' => $request->id,
			]
		);
	}
}
