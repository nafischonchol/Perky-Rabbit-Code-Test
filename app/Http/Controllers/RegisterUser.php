<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Repositories\Interface\IUserRepository;

class RegisterUser extends Controller
{
    protected $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function create()
    {
        return Inertia::render('Signup');
    }

    public function store(SignupRequest $request)
    {
        try {
            $formData = $request->validated();
            $result = $this->userRepo->store($formData);
            if (Auth::login($result)) {
                $request->session()->regenerate();
                return Inertia::location('/');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create user');
            Log::error( $e->getMessage());
            return Inertia::location('/login');
        }
        return Inertia::location('/');
    }
}
