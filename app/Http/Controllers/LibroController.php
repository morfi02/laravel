<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function create()
{
    $generos = [
        'FA' => 'Fantasía'
        ,'RM' => 'Realismo mágico'
        ,'CF' => 'Ciencia ficción'
        ,'NC' => 'Novela clásica'
        ,'FS' => 'Ficción social'
        ,'SP' => 'Suspenso'
        ,'RO' => 'Romántico'
        ,'TE' => 'Terror'
        ,'TR' => 'Tragedia'
        ,'FF' => 'Ficción filosófica'
        ,'HT' => 'Histórico'
        ,'RL' => 'Religión'
        ,'AV' => 'Aventura'
        ,'PS' => 'Psicológico'
        ,'FG' => 'Ficción gótica'
        ,'EP' => 'Épico'
        ,'PE' => 'Poesía épica'
        ,'MM' => 'Memorias'
        ,'PA' => 'Post-apocalíptico'
        ,'LA' => 'Literatura argentina'
        ,'FC' => 'Ficción surrealista'
    ];
    $editoriales = [
        'AN' => 'Anaya',
        'MN' => 'Minotauro',
        'SD' => 'Sudamericana',
        'SW' => 'Secker & Warburg',
        'PL' => 'Planeta',
        'JB' => 'J.B. Lippincott & Co.',
        'PC' => 'Penguin Classics',
        'LH' => 'Lackington, Hughes, Harding, Mavor & Jones ',
        'CS' => 'Charles Scribner\'s Sons',
        'HP' => 'HarperOne',
        'PJ' => 'Plaza & Janés',
        'GN' => 'Grupo Nelson',
        'RH' => 'Reynal & Hitchcock',
        'CC' => 'Cassell & Co.',
        'TM' => 'The Russian Messenger',
        'WL' => 'Ward, Lock & Co.',
        'VR' => 'Varios',
        'EP' => 'Ediciones Planeta',
        'SP' => 'Scholastic Press',
        'GA' => 'George Allen & Unwin',
        'FV' => 'S. Fischer Verlag',
        'CP' => 'Contact Publishing',
        'KN' => 'Knopf',
        'ES' => 'Editorial Sudamericana',
        'KW' => 'Kurt Wolff Verlag',
    ];

    return view('libros.create', compact('generos', 'editoriales'));
}

    

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|digits:4',
            'genero' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado con éxito.');
    }

    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $generos = [
            'FA' => 'Fantasía'
            ,'RM' => 'Realismo mágico'
            ,'CF' => 'Ciencia ficción'
            ,'NC' => 'Novela clásica'
            ,'FS' => 'Ficción social'
            ,'SP' => 'Suspenso'
            ,'RO' => 'Romántico'
            ,'TE' => 'Terror'
            ,'TR' => 'Tragedia'
            ,'FF' => 'Ficción filosófica'
            ,'HT' => 'Histórico'
            ,'RL' => 'Religión'
            ,'AV' => 'Aventura'
            ,'PS' => 'Psicológico'
            ,'FG' => 'Ficción gótica'
            ,'EP' => 'Épico'
            ,'PE' => 'Poesía épica'
            ,'MM' => 'Memorias'
            ,'PA' => 'Post-apocalíptico'
            ,'LA' => 'Literatura argentina'
            ,'FC' => 'Ficción surrealista'
        ];
        $editoriales = [
            'AN' => 'Anaya',
            'MN' => 'Minotauro',
            'SD' => 'Sudamericana',
            'SW' => 'Secker & Warburg',
            'PL' => 'Planeta',
            'JB' => 'J.B. Lippincott & Co.',
            'PC' => 'Penguin Classics',
            'LH' => 'Lackington, Hughes, Harding, Mavor & Jones ',
            'CS' => 'Charles Scribner\'s Sons',
            'HP' => 'HarperOne',
            'PJ' => 'Plaza & Janés',
            'GN' => 'Grupo Nelson',
            'RH' => 'Reynal & Hitchcock',
            'CC' => 'Cassell & Co.',
            'TM' => 'The Russian Messenger',
            'WL' => 'Ward, Lock & Co.',
            'VR' => 'Varios',
            'EP' => 'Ediciones Planeta',
            'SP' => 'Scholastic Press',
            'GA' => 'George Allen & Unwin',
            'FV' => 'S. Fischer Verlag',
            'CP' => 'Contact Publishing',
            'KN' => 'Knopf',
            'ES' => 'Editorial Sudamericana',
            'KW' => 'Kurt Wolff Verlag',
        ];

        return view('libros.edit', compact('libro', 'generos', 'editoriales'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|digits:4',
            'genero' => 'required|string',
            'descripcion' => 'required|string',
            'editorial' => 'nullable|string',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado con éxito.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado con éxito.');
    }


}
