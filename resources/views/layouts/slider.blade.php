<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slider Bootstrap</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .carousel-container {
        max-width: 1200px; /* Giới hạn chiều ngang slider */
        margin: 0 auto; /* Canh giữa */
    }
    .carousel-item img {
        width: 100%;
        height: auto; /* Giữ tỉ lệ ảnh */
        object-fit: cover; /* Cắt ảnh nếu cần */
        border-radius: 0.5rem; /* Bo góc ảnh */
    }
</style>
</head>
<body>

<div class="carousel-container mt-6">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="/image/nen5.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="/image/nen9.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="/image/nen5.jpg" class="d-block w-100" alt="Slide 3">
            </div>
            <!-- Slide 4 -->
            <div class="carousel-item">
                <img src="/image/nen9.jpg" class="d-block w-100" alt="Slide 4">
            </div>
        </div>
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Trước</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Tiếp</span>
        </button>
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
