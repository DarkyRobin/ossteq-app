<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function showForm()
  {
    return view('home');
  }

  public function storeData(Request $request)
  {
    // Validate the request data
    $validatedData = $request->validate([
      'textbox' => 'required|max:100',
      'radiobutton' => 'required',
      'checkbox' => 'nullable|array',
      'image' => 'nullable|image|max:2048', // 2MB max size for the image
    ]);

    // Handle checkbox input to store it as JSON
    $validatedData['checkbox'] = json_encode($validatedData['checkbox'] ?? []);

    // Handle image upload
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $validatedData['image'] = $imagePath;
    }

    // Store the data in the database
    FormData::create($validatedData);

    return redirect()->route('database.view');
  }

  public function viewDatabase()
  {
    $data = FormData::all();

    // Fetch random data from third-party API
    $randomData = Http::get('https://cat-fact.herokuapp.com/facts/random?amount=1')->json();

    return view('partials._database', [
      'data' => $data,
      'randomData' => $randomData
    ]);
  }
}
