<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Logical extends Controller
{
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

        return view('logicaltest')->with('isAnagram', $isAnagram);
    }

    public function viewtest2()
    {
        return view('logicaltest2');
    }

    public function test2(Request $request)
    {
        $sentence = $request->input('sentence');

        $letterCounts = array_count_values(str_split($sentence));

        $mostFrequentLetter = '';
        $maxCount = 0;
        foreach ($letterCounts as $letter => $count) {
            if ($count > $maxCount) {
                $mostFrequentLetter = $letter;
                $maxCount = $count;
            }
        }

        return view('logicaltest2', [
            'mostFrequentLetter' => $mostFrequentLetter,
            'maxCount' => $maxCount
        ]);
    }

    public function viewtest3()
    {
        return view('logicaltest3');
    }

    public function test3(Request $request)
    {
        $n = $request->input('size');
        $array = [];

        for ($i = 0; $i < $n; $i++) {
            $row = [];
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) {
                    $row[] = $n;
                } else {
                    $row[] = 0;
                }
            }
            $array[] = $row;
        }

        // Mengembalikan view dengan array yang dihasilkan
        return view('logicaltest3', ['array' => $array]);
    }
}
