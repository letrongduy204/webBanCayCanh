<style>
     /* 1. Màu nền footer */
    .footer-custom {
        /* Màu xanh lá cây đậm theo hình ảnh bạn cung cấp */
        background-color: #38761D; 
        color: white; /* Màu chữ tổng thể */
        font-size: 0.95rem;
    }

    /* 2. Tiêu đề cột */
    .footer-title {
        color: #FEE599; /* Màu vàng cam cho tiêu đề (hoặc màu trắng nếu muốn) */
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 1.25rem;
    }

    /* 3. Liên kết Về Chúng Tôi */
    .footer-links li a {
        color: white;
        text-decoration: none;
        line-height: 2.2; /* Khoảng cách dòng lớn hơn */
        display: block;
    }

    .footer-links li a:hover {
        color: #f0f0f0;
        text-decoration: underline;
    }

    /* 4. Thanh Keyword cuối Footer */
    .keyword-bar {
        font-style: italic;
        opacity: 0.8;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    /* 5. Khối Fanpage (Mô phỏng giao diện Facebook) */
    .fanpage-mock {
        background-color: white;
        color: #333;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 0.9rem;
    }
    
    .fanpage-logo {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #ddd;
    }

    .fanpage-name {
        color: #3b5998; /* Màu xanh của Facebook */
    }
    
    .fanpage-actions .btn-primary {
        background-color: #3b5998;
        border-color: #3b5998;
        font-size: 0.85rem;
    }

    /* 6. Nút Cố Định (Hotline, Chat, Zalo) */
    .fixed-actions {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .action-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }
    
    .action-btn img {
        width: 60%;
        height: 60%;
    }


</style>
<footer class="footer-custom mt-5 pt-5 pb-4">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="footer-title">THÔNG TIN LIÊN HỆ</h5>
                <p><strong>Cây Nhà Trồng</strong> chuyên bán các loại cây cảnh để bàn, cây cảnh phong thủy, cây cảnh bonsai và cung cấp các dịch vụ liên quan đến cây cảnh.</p>
                <p><strong>Địa chỉ Showroom:</strong> 180 Cao lỗ, phường 4, quận 8, thành phố Hồ Chí Minh</p>
                <p><strong>Hotline:</strong> 0906868688</p>
                <p><strong>Email:</strong> letrongduy204@gmail.com</p>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="footer-title">THÔNG TIN CÔNG TY</h5>
                <p>CÔNG TY TNHH THƯƠNG MẠI HAI THÀNH VIÊN</p>
                <p><strong>Địa chỉ:</strong> Đại lộ Nguyễn Văn Linh, Khu phố 6, Phường 7, Quận 8, TP. Hồ Chí Minh</p>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="footer-title">VỀ CHÚNG TÔI</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Chính sách đổi trả hàng</a></li>
                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">FANPAGE</h5>
                <div class="fanpage-mock">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('image/hinhnenFanpage.jpg') }}" alt="Logo Fanpage" class="fanpage-logo me-2">
                        <div>
                            <p class="mb-0 fw-bold fanpage-name">Cây Nhà Trồng</p>
                            <small>1000 người theo dõi</small>
                        </div>
                    </div>
                    <div class="fanpage-actions">
                        <a href="#" class="btn btn-primary btn-sm me-2">Theo Dõi Trang</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    
</footer>
