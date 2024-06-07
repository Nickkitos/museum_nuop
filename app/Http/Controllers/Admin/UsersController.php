<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    
        $new_user = new User();
        $new_user->name = $validatedData['name'];
        $new_user->email = $validatedData['email'];
        $new_user->password = Hash::make($validatedData['password']); // Хешуємо пароль
        $new_user->assignRole($request->role);
        $new_user->save();
    
        return redirect()->back()->with('success', "Користувач був успішно доданий!");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        // Перевіряємо, чи був введений новий пароль перед його шифруванням
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        
        // Отримання обраної ролі з форми
        $role = $request->role;
        
        // Перевірка, чи користувач вже має цю роль, і якщо ні - присвоєння
        if (!$user->hasRole($role)) {
            // Видаляємо усі поточні ролі користувача
            $user->roles()->detach();
            $user->assignRole($role);
        }

        $user->save();

        return redirect()->back()->with('success', 'Користувач був успішно оновлений');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Користувач був успішно видалений');
    }
}
