<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>

<body>
    <div class="flex flex-col h-screen justify-center items-center">
        <div class="w-[90%] flex flex-col justify-center bg-base-300 rounded-xl shadow-xl p-6 m-6  gap-y-4">
            <img src="{{ asset('img/swadhipa.png') }}" alt="Logo Swadhipa" class="object-contain w-auto h-16">
            <p class="text-base text-neutral-content text-center">Login untuk mengelola data prestasi siswa.</p>

            @if (session('error'))
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('proses-login') }}" method="post"
                class="flex flex-col bg-base-100 rounded-xl shadow-xl p-6 gap-y-4">
                @csrf
                <label class="input input-bordered input-primary flex items-center gap-2">
                    <span class="fa-solid fa-user text-base-content"></span>
                    <input type="text" name="nama_pengguna" class="grow" placeholder="Nama Pengguna" required />
                </label>
                <label class="input input-bordered input-primary flex items-center gap-2">
                    <span class="fa-solid fa-lock text-base-content"></span>
                    <input type="password" name="kata_sandi" class="grow" placeholder="Kata Sandi" required />
                </label>
                <input type="submit" class="btn btn-primary w-full"></input>
            </form>
        </div>
    </div>
</body>

</html>
