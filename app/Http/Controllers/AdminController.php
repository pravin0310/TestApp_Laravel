<?php
// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\ClientUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // public function showImportForm()
    // {
    //     return view('admin.import');
    // }

    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'csv_file' => 'required|mimes:csv,txt|max:2048',
    //     ]);

    //     $file = $request->file('csv_file');
    //     $filePath = $file->store('csv_files');
    //     $file = Storage::path($filePath);

    //     if (($handle = fopen($file, 'r')) !== false) {
    //         $header = fgetcsv($handle); // get the header row

    //         while (($data = fgetcsv($handle)) !== false) {
    //             $userData = array_combine($header, $data);

    //             // Create user
    //             $password = Str::random(8); // Generate a random password
    //             $user = User::create([
    //                 'name' => $userData['firstName'] . ' ' . $userData['lastName'],
    //                 'email' => $userData['email'],
    //                 'phone' => $userData['phone'],
    //                 'designation' => $userData['designation'],
    //                 'doj' => $userData['doj'],
    //                 'password' => Hash::make($password),
    //             ]);

    //             // Send email
    //             Mail::to($user->email)->send(new \App\Mail\UserImportMail($user, $password));
    //         }

    //         fclose($handle);
    //     }

    //     return redirect()->route('admin.import.form')->with('success', 'Users imported successfully!');
    // }
    public function showImportForm()
    {
        return view('admin.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');
        $filePath = $file->store('csv_files');
        $file = Storage::path($filePath);

        if (($handle = fopen($file, 'r')) !== false) {
            $header = fgetcsv($handle); // get the header row

            while (($data = fgetcsv($handle)) !== false) {
                $userData = array_combine($header, $data);

                // Create clientUser
                $password = Str::random(8); // Generate a random password
                $clientUser = ClientUser::create([
                    'firstName' => $userData['firstName'],
                    'lastName' => $userData['lastName'],
                    'email' => $userData['email'],
                    'phone' => $userData['phone'],
                    'designation' => $userData['designation'],
                    'doj' => $userData['doj'],
                    'password' => Hash::make($password),
                ]);

                // Send email
                Mail::to($clientUser->email)->send(new \App\Mail\UserImportMail($clientUser, $password));
            }

            fclose($handle);
        }

        return redirect()->route('admin.import.form')->with('success', 'Users imported successfully!');
    }
}
