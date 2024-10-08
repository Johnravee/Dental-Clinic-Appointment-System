<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController 
{
public function update(Request $request)
{
    try{
        // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'contact' => 'nullable|string|max:12',
        'address' => 'nullable|string|max:255',
        'gender' => 'nullable|in:Male,Female,Other',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048000',
    ]);

    // Retrieve the authenticated user
    $userId = Auth::id();

    // Prepare data for update
    $dataToUpdate = [
        'name' => $validatedData['name'],
        'contact' => $validatedData['contact'],
        'address' => $validatedData['address'],
        'gender' => $validatedData['gender'],
    ];

    // Handle profile image upload if it exists
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageData = file_get_contents($image->getRealPath());
        $imageType = $image->getClientMimeType();
        $dataToUpdate['profile_image'] = 'data:' . $imageType . ';base64,' . base64_encode($imageData);
    }

    // Update the user in the database
    DB::table('users')->where('id', $userId)->update($dataToUpdate);

    // Fetch updated user data
    $updatedUser = User::find($userId);

    return redirect()->route('profile')->with('user_data', $updatedUser);
    }catch(Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

}