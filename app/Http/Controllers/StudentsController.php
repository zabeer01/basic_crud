<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{

    public function AddStudents(){
        return view('add_students');

    }


    public function StoreStudents(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        ]);

        // Find the student or create a new one
        $student = $request->id ? Students::find($request->id) : new Students;

        // Store the old image path before updating
        $oldImagePath = $student->image;

        $student->name = $request->name;

        $path = "public/upload";

        // Handle 'image' upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($path, $imageName);
            $student->image = $path . '/' . $imageName;

            // Delete the old image after successful update
            if ($request->id && !empty($oldImagePath)) {
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        if ($student->save()) {
            return response()->json([
                'error' => false,
                'msg' => 'Success',
            ]);
        }

        // Handle error response if the save fails
        return response()->json([
            'error' => true,
            'msg' => 'Failed to save data'
        ]);
    }

    public function AllStudents(){
        // Fetch Students from the database
       $students = Students::all();
       // Pass the retrieved data to the view
       return view('all_students', ['students' => $students]);
   }

    public function EditStudents($id){
        // Fetch homepage settings from the database based on the provided ID
        $dt['info'] = Students::findOrFail($id); // Assuming 'HomepageSettings' is your model name
        // Pass the details to the view for editing
        return view('edit_students', $dt);
    }
}
