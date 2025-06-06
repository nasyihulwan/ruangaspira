<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Ulasan</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="ulasan_style.css" />
  </head>
  <body>

    <div class="bg-image-vertical"></div>

    <!-- Form Ulasan -->
    <section class="intro">
      <div class="mask d-flex align-items-center h-100">
        <div class="container position-relative">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="card" style="border-radius: 1rem">
                <div class="card-body p-5">
                  <h1 class="mb-4 text-center">Form Ulasan</h1>

                  <form>
                    <!-- Nama Pengulas -->
                    <div class="form-outline mb-4">
                      <input
                        type="text"
                        id="namaPengulas"
                        class="form-control"
                        placeholder="Contoh: John Doe"
                      />
                      <label class="form-label" for="namaPengulas">Nama Anda</label>
                    </div>

                    <!-- Ulasan -->
                    <div class="form-outline mb-4">
                      <textarea
                        class="form-control"
                        id="isiUlasan"
                        rows="5"
                        placeholder="Tulis ulasan Anda di sini..."
                      ></textarea>
                      <label class="form-label" for="isiUlasan">Isi Ulasan Anda</label>
                    </div>

                    <!-- Rating -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="rating">Rating:</label>
                      <select class="form-select" id="rating">
                        <option value="1">1 - Sangat Buruk</option>
                        <option value="2">2 - Buruk</option>
                        <option value="3">3 - Cukup</option>
                        <option value="4">4 - Baik</option>
                        <option value="5">5 - Sangat Baik</option>
                      </select>
                    </div>

                    <!-- Tombol Submit -->
                    <button
                      type="submit"
                      class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                    >
                      Kirim Ulasan
                    </button>

                    <!-- Tombol Kembali -->
                    <div class="text-start">
                      <a href="input.html" class="btn btn-primary btn-sm gradient-custom-2">
                        Kembali
                      </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 bg-light">
      <p class="mb-1">© 2025 ASMA Teknik Komputer</p>
      <a href="https://instagram.com/teknikkomputer.upi" target="_blank" class="text-dark text-decoration-none ig-link">
        <i class="bi bi-instagram"></i> @teknikkomputer.upi
      </a>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- MDBootstrap JS (optional if using MDB components) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
  </body>
</html>
