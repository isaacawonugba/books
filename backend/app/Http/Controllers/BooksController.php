<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function listAllBooks(){
        return response()->json(Book::paginate(12));
    }

    public function showBookById($id){
        return response()->json(Book::find($id));
    }

    public function create(Request $request){
        //Validation
        $this->validate($request, [
            'book_title' => 'required',
            'book_description' => 'required',
            'book_author' => 'required',
            'book_cover' => 'required',
            'book_price' => 'required',
            'book_status' => 'required'
        ]);
       $full = "";
        if ($request->hasFile('book_cover')) { 
            $picName = $request->file('book_cover')->getClientOriginalName();
            $newName = 'book-' . uniqid() . '-' . $picName;
        
            $path = 'images';
            File::makeDirectory($path, 0777, true, true);
            $request->file('book_cover')->move($path, $newName);
            $full = $path. DIRECTORY_SEPARATOR . $newName;
            $request->book_cover = $full;
        }
        $data = $request->all();
        $data["book_cover"] = $full;
        // Insert new book record
        $book = Book::create($data);
        return response()->json($book, 201);

    }

    public function update($id, Request $request){
        // Validation
        $this->validate($request, [
            'book_status' => 'required'
        ]);

        //update book status to 0 -> Sold
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function delete($id){
        //Find the book with the matching id and delete
         Book::findOrFail($id)->delete();
         return response('Deleted successfully', 200);
    }
}
