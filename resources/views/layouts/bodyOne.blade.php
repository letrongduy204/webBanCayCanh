<style>
/* Custom CSS cho phần Lý do chọn */

.icon-box {
    /* Căn giữa icon */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.icon-box img {
    /* Đảm bảo icon có kích thước phù hợp, ví dụ 100x100px */
    width: 100px; 
    height: 100px;
}

.card {
    /* Đảm bảo nội dung căn giữa trong card */
    text-align: center;
    transition: transform 0.3s ease; /* Thêm hiệu ứng hover */
}

.card:hover {
    transform: translateY(-5px); /* Nâng card lên một chút khi di chuột */
}

</style>

<div class="container py-5">
    <div class="row text-center mb-4">
        <div class="col-12">
            <h2 class="fw-bold">LÝ DO CHỌN CÂY NHÀ TRỒNG</h2>
        </div>
    </div>
    
    <div class="row">
        
        {{-- CARD 1: ĐA DẠNG --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="card-body">
                    {{-- Hình ảnh (Thay thế bằng đường dẫn ảnh thực tế hoặc dùng SVG như hình) --}}
                    <div class="icon-box mb-3">
                                            </div>
                    <h4 class="card-title fw-bold text-uppercase">ĐA DẠNG</h4>
                    <p class="card-text">
                        Dễ dàng lựa chọn sản phẩm mà bạn mong muốn, từ cây cảnh ngoại thất đến cây cảnh theo chủ đề, phong thủy hoặc đặt làm quà tặng
                    </p>
                </div>
            </div>
        </div>

        {{-- CARD 2: CHẤT LƯỢNG --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="card-body">
                    {{-- Hình ảnh (Thay thế bằng đường dẫn ảnh thực tế hoặc dùng SVG) --}}
                    <div class="icon-box mb-3">
                                            </div>
                    <h4 class="card-title fw-bold text-uppercase">CHẤT LƯỢNG</h4>
                    <p class="card-text">
                        Mọi cây xanh đều được chọn lọc kỹ lưỡng, cam kết chỉ giao những cây khỏe mạnh, dáng đẹp và sẵn sàng thích nghi với môi trường mới
                    </p>
                </div>
            </div>
        </div>

        {{-- CARD 3: CẠNH TRANH --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="card-body">
                    {{-- Hình ảnh (Thay thế bằng đường dẫn ảnh thực tế hoặc dùng SVG) --}}
                    <div class="icon-box mb-3">
                                            </div>
                    <h4 class="card-title fw-bold text-uppercase">CẠNH TRANH</h4>
                    <p class="card-text">
                        Tối ưu hóa ngân sách nhờ mức giá cực kỳ cạnh tranh, phù hợp cho khách lẻ và khách có số lượng đơn hàng lớn và khách mua hàng lâu dài
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>