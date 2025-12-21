

<style>
    /* Màu nền xanh lá nhạt */
    .navbar-custom {
        background-color: #dff5d1 !important;  /* xanh lá nhạt */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom border-bottom">
    <div class="container" style="max-width: 1200px;"> <!-- Giới hạn chiều rộng -->
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menunavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menunavbar">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link active text-success fw-semibold" href="{{ route('caycanh.index') }}">
                        Cây Cảnh
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Giới Thiệu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Danh Mục Cây</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Tùng La Hán</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Kinh Nghiệm</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Liên Hệ</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
