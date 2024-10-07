<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nemara Beauty</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="hidden">
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Nemara Beauty Logo">
            </div>
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/treatments">Treatments</a></li>
                <li><a href="/reservation">Reservation</a></li>
                <li><a href="/products">Products</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero zoom-in">
            <img 
                src="{{ asset('images/home.png') }}" 
                srcset="{{ asset('images/home.png') }} 1920w, {{ asset('images/home-small.png') }} 768w" 
                sizes="(max-width: 768px) 100vw, 1920px" 
                alt="Nemara Beauty Hero" 
                class="hero-image">
        </section>

        <section class="about fade-in">
            <h2>About Nemara Beauty</h2>
            <p>Nemara Beauty adalah klinik kecantikan yang berfokus pada perawatan alami untuk meningkatkan kecantikan sejati Anda. 
                Dengan layanan perawatan kulit dan kecantikan berkualitas tinggi, kami berkomitmen membantu setiap individu memancarkan pesona alami mereka. 
                Di Nemara Beauty, kami percaya kecantikan sejati terpancar dari dalam, didukung oleh perawatan yang tepat dan suasana yang nyaman.</p>

            <p><strong>Visi:</strong></p>
            <p>Menjadi klinik kecantikan terdepan yang mengedepankan perawatan alami untuk mendukung kecantikan sejati, serta memberikan pengalaman yang holistik dan berkualitas bagi setiap individu.</p>
            
            <p><strong>Misi:</strong></p>
            <ol>
                <li>Memberikan layanan perawatan kulit dan kecantikan berkualitas tinggi dengan pendekatan alami dan aman.</li>
                <li>Menciptakan lingkungan yang nyaman dan mendukung, di mana setiap klien merasa dihargai dan percaya diri.</li>
                <li>Mengedukasi klien tentang pentingnya perawatan diri dan keseimbangan antara kesehatan dalam dan luar.</li>
                <li>Terus berinovasi dalam menyediakan solusi kecantikan yang disesuaikan dengan kebutuhan unik setiap individu.</li>
            </ol>
        </section>

        <section class="cta fade-in">
            <a href="/products" class="btn">Buy Products</a>
            <a href="/reservation" class="btn">Make a Reservation</a>
        </section>

        <footer>
            <div class="footer-info fade-in">
                <p>Address: Jl. Kecantikan No. 1, Surabaya</p>
                <p>Hours: Mon - Sun: 09.00 - 17.00</p>
            </div>
            <p class="copyright fade-in">© 2024 | Nemara Beauty</p>
        </footer>
    </main>

    <script>
        window.onload = function() {
            document.body.classList.remove('hidden');
        };
    </script>
</body>
</html>
