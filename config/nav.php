	<header class="sticky-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-info" id="nav-main">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="logo-main" src="<?=$MinhChien->site('logo');?>" width="250" alt="logo">
                    </a> 
                 
                <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-md-0 me-auto c-font-upper dropHeadHover">
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/">TRANG CHỦ</a></li>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="https://random.clzlpay123.me/">VÒNG QUAY MAY MẮN</a></li>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/bank">NẠP TIỀN</a></li>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/ruttien">RÚT TIỀN</a></li>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/profile">THÔNG TIN TÀI KHOẢN</a></li>
                        <?php if($MinhChien->users('level') == 3) { ?>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/admin/home">TRANG QUẢN TRỊ</a></li>
                        <?php } ?>
                        <li class="nav-item text-upper"><a class="nav-link text-light h5" href="/logout">ĐĂNG XUẤT</a></li>
                    </ul>   
                </div>
            </div>
        </nav>
    </header>
					