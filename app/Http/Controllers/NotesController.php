<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Services\NotesService;
use Illuminate\Http\Request;

class NotesController
{
    protected $notesService;

    public function __construct(NotesService $notesService)
    {
        $this->notesService = $notesService;
    }

    public function index(Request $request)
    {
        $notes = Notes::all();
    
        if ($request->expectsJson()) {
            return response()->json($notes);
        }
    
        return view('dashboard', ['notes' => $notes]);
    }    
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'data' => 'required',
            'imagem' => 'nullable',
            'descricao' => 'required',
        ]);

        try {
            Notes::create($validatedData);
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Nota criada com sucesso', 'request' => $request->all()], 201);
            } else {
                return redirect()->route('dashboard')->with(['success' => 'Nota criada com sucesso.', 'request' => $request->all()]);
            }
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Erro ao criar uma nota'], 500);
            } else {
                return redirect()->route('add-new-note')->with('error', 'Erro ao criar uma nota.');
            }
        }
    }

    public function show($id)
    {
        $notes = Notes::findOrFail($id);
        return $notes;
    }

    public function update(Request $request, $id)
    {

        $note = Notes::findOrFail($id);
    
        $note->update([
            'nome' => $request->nome,
            'data' => $request->data,
            'imagem' => $request->imagem,
            'descricao' => $request->descricao,
            'terms' => 'accept',
        ]);

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Nota editada com sucesso'], 200);
        } 

        return view('dashboard')->with('note', $note);
    }

    public function destroy($id)
    {
        try {
            // Encontrar a nota pelo ID
            $note = Notes::findOrFail($id);
            
            // Deletar a nota
            $note->delete();
            
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Nota deletada com sucesso'], 200);
            }
        } catch (\Exception $e) {
            if (request()->expectsJson()) {
                return response()->json(['error' => 'Erro ao deletar a nota'], 500);
            }
        }
    }
}
