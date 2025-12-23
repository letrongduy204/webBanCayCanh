
<style>
.navbar-brand img {
    height: 40px;
    margin-right: 10px;
}

@media (min-width: 992px) {

    .search-bar {
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }
}

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('image/logo.jpg') }}" alt="Logo" class="d-inline-block align-text-top"> 
            CÂY NHÀ TRỒNG
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topnavbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topnavbarNav">
            
            <form class="d-flex mx-lg-auto search-bar mt-2 mt-lg-0" role="search">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn btn-warning" type="submit">Tìm</button>
            </form>
<!-- Xử lý đăng nhập, phân quyền khi đăng nhập-->
<ul class="navbar-nav ms-lg-auto">

    {{-- Nếu là Admin: hiện menu quản lý --}}
    @if(session('user_role') === 'Admin')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                Quản lý
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
                <li><a class="dropdown-item" href="{{ route('admin.users') }}">Quản lý tài khoản</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.products') }}">Quản lý sản phẩm</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.orders') }}">Quản lý đơn hàng</a></li>
            </ul>
        </li>
    @endif

    {{-- Phần hiển thị đăng nhập / xin chào --}}
    @if(session('user_id'))
        <li class="nav-item">
            <span class="nav-link">
                Xin chào, {{ session('user_name') }}
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                Đăng xuất
            </a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                Đăng Nhập <i class="fa-regular fa-user"></i>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cart.index') }}">
            Giỏ Hàng <i class="fa-solid fa-basket-shopping "></i>
        </a>
    </li>
</ul>

<!-- ----------- Kết thúc ------------------- -->

        </div>
    </div>
</nav>
