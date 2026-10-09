<?php

namespace App\Http\Controllers;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logins = Login::all();
        return view('index', compact('logins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validater = $request->validate([
            'name'=> 'required|max:20',
            'email'=> 'required|email|unique:logins,email',
            'password'=> 'required|min:8',
            ]);

           $login = new Login();
           $login->name=$request->name;
           $login->email=$request->email;
           $login->password=Hash::make($request->password);
           $login->save();
           

           return redirect('/login')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $login = Login::findorFail($id);

    return view('edit', compact('login'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $login = Login::findorFail($id);
        $validater = $request->validate([
            'name'=> 'required|max:20',
            'email'=> 'required|email',
            'password'=> 'required|min:8',
            ]);
           $login->name=$request->name;
           $login->email=$request->email;
           $login->password=Hash::make($request->password);
           $login->save();
           

           return redirect('/login')->with('success', 'User edited successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $login = Login::findorFail($id);
         $login->delete();
         return redirect('/login')->with('success', 'User deleted successfully.');
    }
    public function getUser($id)
{
    return Login::find($id);
}

    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $login = Login::where('email', $request->email)->first();

    if (!$login) {
        return response()->json([
            'message' => 'Email or password is incorrect.'
        ], 401);
    }

    if (!Hash::check($request->password, $login->password)) {
        return response()->json([
            'message' => 'Email or password is incorrect.'
        ], 401);
    }

    return response()->json([
        'message' => 'Login successful.',
    ]);
}
public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email|unique:logins,email',
        'password' => 'required|min:8',
    ]);

    $login = new Login();
    $login->name = $validated['name'];
    $login->email = $validated['email'];
    $login->password = Hash::make($validated['password']);
    $login->save();

    return response()->json(['message' => 'Registration successful.'], 201);
}
public function deleteUser($id)
{
    $login = Login::find($id);

    $login->delete();

    return response()->json([
        'message' => 'User deleted'
    ]);
}
public function users()
{
    return response()->json(Login::all());
}
public function logout()
{
    session()->forget('login_id');

    return redirect('/vue-login');
}
}
