<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Config;

class ProfileService
{
    public function getUserProfile($userId)
    {
        return User::find($userId);
    }

    public function updateProfile($userId, $requestData)
    {
        if (Config::get('app.is_demo') && in_array($userId, [1])) {
            return [
                'status' => 'error',
                'message' => "You are in a demo version. You are not allowed to change the email for default users."
            ];
        }

        $validationRules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
            'location' => 'max:255',
            'phone' => 'numeric|digits:10',
            'about' => 'max:255',
        ];

        $validationMessages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
        ];

        $validatedData = $this->validateData($requestData, $validationRules, $validationMessages);

        $user = User::find($userId);
        $user->update($validatedData);

        return [
            'status' => 'success',
            'message' => 'Profile updated successfully.'
        ];
    }

    protected function validateData($data, $rules, $messages)
    {
        return \Validator::make($data, $rules, $messages)->validate();
    }
}
