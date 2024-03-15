<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anagram Checker</title>
</head>

<body>
    <h2>Anagram Checker</h2>
    <form action="{{ route('test1') }}" method="post">
        @csrf
        <label for="word1">Kata 1:</label>
        <input type="text" id="word1" name="word1"><br><br>
        <label for="word2">Kata 2:</label>
        <input type="text" id="word2" name="word2"><br><br>
        <button type="submit">Cek Kata</button>
    </form>
    @isset($isAnagram)
        <p>{{ $isAnagram ? 'True' : 'False' }}</p>
    @endisset
</body>

</html>
