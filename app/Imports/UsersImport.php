<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Check if a user with the same email address already exists
        $existingUser = User::where('email', $row['email'])->first();

        if ($existingUser) {
            // User with the same email address already exists, skip inserting
            return null;
        }

        // Create and return a new user
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']), // Hash the password before saving
        ]);
    }
}
