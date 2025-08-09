    <main class="container my-5">

<!-- Bagian Filter Kategori -->
<h2 class="text-center mb-4">Kategori Pilihan</h2>
<div id="filter-buttons" class="d-flex flex-wrap justify-content-center gap-3 mb-5">
    <!-- Tombol grup akan dibuat secara dinamis di sini oleh home.js -->
</div>

<!-- Bagian Produk yang Difilter -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 id="product-section-title" class="fw-bold text-dark">Produk Terbaru</h2>
    <a href="/products" class="text-decoration-none text-dark fw-bold">lihat semua</a>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5" id="productList">
    <!-- Produk akan dimuat di sini oleh JavaScript -->
</div>




        <section id="faq-section" class="container my-5">
            <h2 class="text-center mb-5 fw-bold" style="color: #7B68EE;">FAQ</h2>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item shadow-sm mb-3">
                    <h2 class="accordion-header" id="shipping-heading">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#shipping-collapse" aria-expanded="true" aria-controls="shipping-collapse">
                            Shipping
                        </button>
                    </h2>
                    <div id="shipping-collapse" class="accordion-collapse collapse show" aria-labelledby="shipping-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <h6 class="fw-bold">I'D LIKE TO CHANGE MY SHIPPING ADDRESS, CAN I DO THAT?</h6>
                                <p>You can change your shipping address within 24 hours of placing your order. Please contact our customer support team immediately with your order number and the new address. After 24 hours, the address cannot be changed.</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="fw-bold">MY TRACKING NUMBER HAS NO SHIPPING UPDATES, WHERE IS MY PACKAGE?</h6>
                                <p>Tracking numbers can take up to 48 hours to show updates after a shipping label has been created. If there are still no updates after this period, please contact our support team with your tracking number, and we will investigate.</p>
                            </div>
                            <div>
                                <h6 class="fw-bold">MY SHIPPING SAYS "DELIVERED", BUT I HAVE NOT RECEIVED THE PACKAGE. WHAT HAPPENED?</h6>
                                <p>Sometimes, carriers may mark a package as "delivered" a day or two in advance. If you still don't have the package after 48 hours, please check with your neighbors or apartment office. If it's still missing, file a claim with the shipping carrier and let us know.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item shadow-sm mb-3">
                    <h2 class="accordion-header" id="order-heading">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapse" aria-expanded="false" aria-controls="order-collapse">
                            Order
                        </button>
                    </h2>
                    <div id="order-collapse" class="accordion-collapse collapse" aria-labelledby="order-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <h6 class="fw-bold">I DID NOT RECEIVE A CONFIRMATION EMAIL AFTER PLACING AN ORDER. WHAT WENT WRONG?</h6>
                                <p>First, please check your spam or junk folder. If you still can't find it, it's possible there was a typo in your email address. Contact our support team with your name and the date of your order so we can help you find your confirmation and update your details.</p>
                            </div>
                            <div>
                                <h6 class="fw-bold">HOW CAN I CANCEL MY ORDER?</h6>
                                <p>Orders can only be canceled within 12 hours of being placed. To cancel, please log in to your account, go to "My Orders," and click the cancel button next to the order you wish to cancel. If the 12-hour window has passed, the order cannot be canceled.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item shadow-sm">
                    <h2 class="accordion-header" id="more-info-heading">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#more-info-collapse" aria-expanded="false" aria-controls="more-info-collapse">
                            More Info
                        </button>
                    </h2>
                    <div id="more-info-collapse" class="accordion-collapse collapse" aria-labelledby="more-info-heading" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold">DO YOU HAVE OTHER QUESTIONS?</h6>
                            <p>If you still have questions, please feel free to contact our customer service team. We are available to help you via email or live chat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about-us" class="container my-5 py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="mb-4 fw-bold" style="color: #7B68EE;">Tentang Kami</h2>
                    <img src="{{ asset('image/kpop-web-logo.png') }}" alt="K-Pop Mart Logo" class="img-fluid mb-4">
                    <p class="lead text-muted">
                        K-Pop Mart adalah toko online terpercaya untuk semua kebutuhan merchandise K-Pop resmi.
                        Kami berkomitmen untuk menyediakan koleksi terbaik dan terlengkap dari idola favoritmu,
                        mulai dari album, lightstick, apparel, hingga aksesoris eksklusif.
                        Nikmati pengalaman berbelanja yang aman dan nyaman bersama kami!
                    </p>
                </div>
            </div>
        </section>
    </main>