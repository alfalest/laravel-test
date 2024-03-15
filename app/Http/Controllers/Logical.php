<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logical extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewtest1()
    {
        return view('logicaltest');
    }

    public function test1(Request $request)
    {
        $word1 = strtolower(str_replace(' ', '', $request->input('word1')));
        $word2 = strtolower(str_replace(' ', '', $request->input('word2')));

        $sorted_word1 = str_split($word1);
        sort($sorted_word1);
        $sorted_word1 = implode('', $sorted_word1);

        $sorted_word2 = str_split($word2);
        sort($sorted_word2);
        $sorted_word2 = implode('', $sorted_word2);

        $isAnagram = $sorted_word1 === $sorted_word2;

        // Kembalikan view dengan menyertakan variabel $isAnagram
        return view('logicaltest')->with('isAnagram', $isAnagram);
    }
}
