<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatments - Nemara Beauty</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
</head>
<body>
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
        <h2>Nemara Treatments Book</h2>
        <section class="pdf-display">
            <button id="prev" class="nav-button">&#9664;</button>
            <canvas id="pdf-canvas"></canvas>
            <button id="next" class="nav-button">&#9654;</button>
        </section>

        <section class="reservation-cta">
            <h3>Interested in Booking a Treatment?</h3>
            <p>Click the button below to make a reservation.  You will be prompted to log in or sign up if you haven't already.</p>
            <a href="/reservation" class="btn">Book Now</a>
        </section>
    </main>

    <footer>
        <div class="footer-info">
            <p>Address: Jl. Kecantikan No. 1, Surabaya</p>
            <p>Hours: Mon - Sun: 09.00 - 17.00</p>
        </div>
        <p class="copyright">© 2024 | Nemara Beauty</p>
    </footer>

    <script>
        const url = "{{ asset('menu/treatments book.pdf') }}";

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.getElementById('pdf-canvas'),
            ctx = canvas.getContext('2d');

        const renderPage = (num) => {
            pageIsRendering = true;
            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;
                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });
            });
        };

        const queueRenderPage = (num) => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        const onPrevPage = () => {
            if (pageNum <= 1) return;
            pageNum--;
            queueRenderPage(pageNum);
        };

        const onNextPage = () => {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            queueRenderPage(pageNum);
        };

        pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;
            renderPage(pageNum);
        });

        document.getElementById('prev').addEventListener('click', onPrevPage);
        document.getElementById('next').addEventListener('click', onNextPage);
    </script>
</body>
</html>
