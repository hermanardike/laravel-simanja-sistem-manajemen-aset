<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller implements UpdatesUserPasswords
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $users = DB::table('users')
            ->when($request->input('search'), function($query, $search) {
                $query->where('name', 'like',"%" . $search . "%")
                    ->orWhere('email', 'like',"%" . $search . "%")
                    ->orWhere('role', 'like',"%" . $search . "%");
            })->paginate(5);
        return view('user.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->remember_token = Str::random('10');
        $user->save();
        return redirect('/user/create')->with('status', 'Berhasil Menambahkan User Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
       return view('user.show',['user' => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $user = User::find($id);
        return view('user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => "required|email|unique:users,email,$id",
            'phone' => 'required|numeric|digits_between:10,12',

        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password =Hash::make('password');
        $user->bio   = $request->bio;
        $user->email_verified_at = now();
        $user->save();


        return redirect("/user/{$user->id}/edit")->with('status', 'Berhasil Update User');
    }


    public function UpdatePassword(Request $request, $id) {

        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $request->validate([
            'current_password' => ['required','string', 'current_password:web'],
            'current_password.current_password' =>__ ('The provided password does not match your current password.'),
            'password' => $this->passwordRules(),
        ]);

        $password = User::findOrFail($id);
        $password->password = Hash::make($request->password);
        $password->save();
        return redirect("/user/{$password->id}/edit")->with('status', 'Berhasil Update Password  User');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Gate::denies('index-user')) {
            abort(404,'Anda Tidak Memilki Akses');
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status', 'Berhasil Menghapus User');
    }
}
