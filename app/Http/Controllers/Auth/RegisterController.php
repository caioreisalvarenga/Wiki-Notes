<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signup');
    }

    public function index(Request $request)
    {
        $users = User::all();
    
        if ($users->isEmpty()) {
            throw new \Exception('Não existe nenhum usuário na base de dados');
        }
    
        if ($request->wantsJson()) {
            return response()->json($users);
        }
    
        return response()->json();
    }

    public function show($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    
        if (request()->wantsJson()) {
            return response()->json($user);
        }
    
        return view('dashboard', compact('user'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable',
            'terms' => 'accepted',
        ]);
    
        try {
            User::create($validatedData);
            if ($request->wantsJson()) {
                return redirect()->route('dashboard')->with(['success' => 'Usuário criado com sucesso']);
            }
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json(['error' => 'Erro ao criar um usuário'], 500);
            } else {
                return redirect()->route('add-new-note')->with('error', 'Erro ao criar um usuário.');
            }
        }
    }
   
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'terms' => 'accept',
        ]);

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Usuário editado com sucesso'], 200);
        } 

        return redirect()->route('dashboard');
    }
    
    public function destroy($id)
    {
        $requestData = request()->all();
    
        try {
            // Encontrar o usuário pelo ID
            $user = User::findOrFail($id);
            
            // Deletar o usuário
            $user->delete();
            
            if (request()->wantsJson()) {
                return response()->json(['message' => 'Usuário deletado com sucesso'], 200);
            } 
        } catch (\Exception $e) {
            if (request()->wantsJson()) {
                return response()->json(['error' => 'Erro ao deletar o usuário'], 500);
            }
        }
    }
}