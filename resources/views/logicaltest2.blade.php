<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Logical Testing</title>
</head>

<body>
    <div class="container">
        <div class="row">
            {{-- NAVIGATION --}}
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Laravel Test</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logical-test" target="_blank">Logical Test</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- CONTENT --}}
            <h2 class="text-center mt-5">Mencari Huruf Terbanyak</h2>
            <form action="{{ route('test2') }}" method="post">
                @csrf
                <label for="sentence" class="form-label">Kalimat:</label>
                <input type="text" id="sentence" name="sentence" class="form-control"><br><br>
                <button type="submit" class="btn btn-outline-dark text-center">Cari Huruf Terbanyak</button>
            </form>
            @isset($mostFrequentLetter)
                <h3 class="text-center mt-5">Hasil</h3>
                <div class="alert alert-dark border-0 shadow-sm" role="alert">
                    <p class="text-center fs-5">Huruf <strong>{{ $mostFrequentLetter }}</strong> muncul sebanyak
                        {{ $maxCount }}
                        kali</p>
                </div>
            @endisset
            <div class="row">
                <div class="col-6">
                    <div class=" text-start mt-5">
                        <a href="/logical-test" class="btn btn-outline-dark">Pergi ke Test 1 &nbsp;<i
                                class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" text-end mt-5">
                        <a href="/logical-test-3" class="btn btn-outline-dark">Pergi ke Test 3 &nbsp;<i
                                class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
