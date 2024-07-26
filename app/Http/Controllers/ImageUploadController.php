<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
	public function uploadImage(Request $request)
	{
		$request->validate([
				'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		if ($request->hasFile('image')) {
				$file = $request->file('image');
				$imageName = time() . '.' . $file->getClientOriginalExtension();
				$file->move(public_path('images'), $imageName);
				
				return back()
					->with('success', 'You have successfully uploaded the image.')
					->with('image', $imageName);
		}

		return response()->json([
				'message' => 'No image file was uploaded.'
		], 400);
	}

}
