<?php

namespace App\Repositories;

use App\Http\Resources\educationResource;
use App\Http\Resources\experienceResource;
use App\Http\Resources\profileResource;
use App\Http\Resources\socialResource;
use App\Http\Resources\userResource;
use App\Models\Profile;
use App\Models\User;
use App\Models\User_education;
use App\Models\User_experience;
use App\Models\User_social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;

class UserEloquent
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function login()
    {
        $proxy = Request::create('oauth/token', 'POST');
        $response = Route::dispatch($proxy);
        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getContent());
        if ($statusCode != 200)
            return response_api(false, $statusCode, $response->message, $response);
        $response_token = $response;
        $token = $response->access_token;
        \request()->headers->set('Authorization', 'Bearer ' . $token);

        $proxy = Request::create('api/profile', 'GET');
        $response = Route::dispatch($proxy);

        $statusCode = $response->getStatusCode();
        $response = json_decode($response->getContent());
        $user = \auth()->user();
        return response_api(true, $statusCode, 'Successfully Login', ['token' => $response_token, 'user' => $user]);

    }

    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return response_api(true, 200, 'Successfully Register!', $user->fresh());

    }

    public function profile()
    {
        $user = \auth()->user();
        return response_api(true, 200, 'Successfully !', new userResource($user));
    }

}
