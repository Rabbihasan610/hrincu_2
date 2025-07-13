<?php

namespace Database\Seeders;

use App\Models\User;
use App\Constants\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('app/public/users.csv');

        if (!file_exists($filePath)) {
            $this->command->error("CSV file not found at: $filePath");
            return;
        }

        $csvData = array_map('str_getcsv', file($filePath));

        // Skip empty rows
        $csvData = array_filter($csvData, fn($row) => count($row) > 1);

        // Remove headers (if first row contains 'id' or 'email')
        if (isset($csvData[0]) && strtolower($csvData[0][0]) === 'id') {
            array_shift($csvData);
        }

        // user table truncate
        User::truncate();

        $this->command->info('Importing users...');

        foreach ($csvData as $row) {
            // Ensure the row has enough columns
            if (count($row) < 15 || empty($row[3])) {
                continue;
            }

            // Skip if email already exists
            if ($this->isEmailExists($row[3])) {
                continue;
            }

            $user = new User();
            $user->name = $row[1] ?? 'N/A';
            $user->username = $this->generateUsername($row[3]);
            $user->user_type = $this->getUserType($row[6] ?? null);
            $user->email = $row[3];
            $user->password = isset($row[5]) ? $row[5] : Hash::make('default_password');
            $user->image = $row[2] ?? null;
            $user->country_id = $row[9] ?? 0;
            $user->mobile = isset($row[8]) ? preg_replace('/[^0-9+]/', '', trim(explode(' ', $row[8])[0])) : null;
            $user->status = Status::USER_ACTIVE;
            $user->ev = Status::VERIFIED;
            $user->sv = Status::VERIFIED;
            $user->profile_complete = Status::YES;
            $user->district = $row[10] ?? null;
            $user->location = $row[11] ?? null;
            $user->about = $row[12] ?? null;
            $user->website = $row[14] ?? null;

            $user->save();
        }
    }

    private function isEmailExists($email): bool
    {
        return User::where('email', $email)->exists();
    }

    private function generateUsername($email): string
    {
        $username = Str::slug(str_replace(' ', '', strtolower($email)), '_');

        // Remove first character if numeric
        if (isset($username[0]) && is_numeric($username[0])) {
            $username = substr($username, 1);
        }

        // Remove invalid characters
        $username = preg_replace('/[^a-zA-Z0-9_]/', '', $username);

        // Add prefix
        //$username = 'user_' . $username;

        // Ensure uniqueness
        $originalUsername = $username;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . '_' . $counter;
            $counter++;
        }


        // Ensure minimum length
        if (strlen($username) < 6) {
            $username = $originalUsername . '_' . $counter;
        }

        // remove suffix
        $username = str_replace('_at_gmailcom', '', $username);

        return $username;
    }

    private function getUserType($type): string
    {
        return match ($type) {
            1 => 'job_provider',
            2 => 'job_seeker',
            default => 'job_provider',
        };
    }

}
