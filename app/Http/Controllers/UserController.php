<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-control')->except('register','login','logout');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Data = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:20|min:8',
            'confirm_password' => 'required|string|max:20|min:8|same:password',
            'role' => 'required|in:admin,writer'
        ]);

        // dd($validation);

        User::create($Data); //طريقة الموديل دي اكثر من امان من ال query builderلكن لازم اعمل  ليها ال failable
        return back()->with('success', 'user added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function posts(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('users.posts', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $email_rule = Rule::unique('users')->ignore($user->id);
        $rules = [
            'required',
            'email',
            $email_rule
        ];
        $Data = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => $rules,
            'password' => 'nullable|string|max:20|min:8',
            'confirm_password' => 'nullable|string|max:20|min:8|same:password',
            'role' => 'required|in:admin,writer'
        ]);
        //في حالة الابديت عملت الباسورد ممكن يكون فاضي بحيث لو اليوزر مش عاوز يغيره وشيكت عليه

        $Data['password'] = $request->filled('password') ? bcrypt($request->password) : $user->password;

        unset($Data['confirm_password']);
        User::where('id', $user->id)->update($Data);
        return redirect()->route('users.edit', $user->id)->with('success', 'User upated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        return back()->with('success', 'user deleted succefully');
    }

    //api

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'user registered successfully',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => 'invalid user'], 401);
        }
        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'login successfully',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {

        $user = auth()->user();

        if ($user && $user?->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logout successfully'], 200);
        }

        return response()->json(['message' => 'Unauthenticated.'], 401);
    }

}
