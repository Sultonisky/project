<!-- resources/views/barang.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BerbagiLagi - Home</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/items.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('admin_assets/img/logo_berbagilagi.png') }}" width="250">
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('items') }}">Barang</a></li>
                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
            </ul>
            <div class="nav-icons">
                <a href="{{ route('history') }}">
                    <img src="{{ asset('admin_assets/icons/history.png') }}" alt="Notif" class="notif-icon"></a>
                <button class="btn-primary">{{ Auth::user()->role }}</button>
                <a href="" onclick="event.preventDefault(); document.getElementById('keluar-app').submit();"><img
                        src="{{ asset('admin_assets/icons/logout.png') }}" alt="Logout" class="logout-icons"></a>
            </div>
        </div>
    </nav>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Sub Category Tabs -->
    <div class="sub-category">
        <button class="tab active" data-category="semua">Semua</button>
        <button class="tab" data-category="baju">Baju</button>
        <button class="tab" data-category="celana">Celana</button>
        <button class="tab" data-category="jacket">jacket</button>
        <button class="tab" data-category="sepatu">Sepatu</button>
        <button class="tab" data-category="sandal">Sandal</button>
    </div>


    <!-- Produk Wrapper + Grid -->
    <div class="produk-wrapper">
        <div class="produk-container">
            @foreach ($items as $item)
                <div class="produk-card baju">
                    {{-- <form action="{{ route('itemsClaim', $item->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}"> --}}
                    <img src="{{ asset('storage/img-items/' . $item->foto) }}" alt="Produk">
                    <div class="produk-info">
                        <h3>{{ $item->category->name }} - {{ $item->name }}</h3>
                        <p>
                            @if ($item->status == 'tersedia')
                                <span>Tersedia</span>
                            @elseif($item->status == 'proses')
                                <span>Proses</span>
                            @elseif($item->status == 'didonasikan')
                                <span>Didonasikan</span>
                            @endif | {{ $item->condition }}
                        </p>
                        <div class="button-group">
                            {{-- <a href="https://wa.me/{{ $item->user->phone }}" target="_blank" aria-label="WhatsApp"
                                    class="wa-button">
                                    <i class="fab fa-whatsapp"></i>
                                </a> --}}
                            <a type="button" href="{{ route('claims.form', $item->id) }}">Ajukan Permintaan +</a>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            @endforeach

        </div>
    </div>

    <form id="keluar-app" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


    <footer class="footer">
        <hr class="footer-divider" />
        <div class="footer-content">
            <img src="{{ asset('admin_assets/img/logo_berbagilagi.png') }}" alt="Logo BerbagiLagi"
                class="footer-logo" />

            <p class="footer-description">
                BerbagiLagi adalah platform untuk berbagi kebutuhan kepada yang membutuhkan.
            </p>

            <div class="footer-socials">
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </footer>
    <script src="{{ asset('admin_assets/js/filter.js') }}"></script>
</body>

</html>
