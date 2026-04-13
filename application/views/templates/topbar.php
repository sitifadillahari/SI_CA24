<nav class="navbar navbar-expend navbar-expend navbar-light bg-gray-500 topbar mb-4 static-top shadow">
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
<i class="fa fa-bars"></i>
</button>
<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
data-toggle="deopdown" aria-haspopup="true" aria-expanded="false">
<span class="mr-2 d-none d-Ig-inline text-grey-600 small">
        Admin
    </span>
    <img class="img-profile rounded-circle" src="<?=base_url('assets/img/undrew_profile_2.svg')?>" width="40">
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>
        <div class="dropdown-divider"></div>
        <span class="dropdown-item text-muted small">
            Last login:
        </span>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= site_url('auth/logout')?>">
            <i class="fas fa-sign-out-all fa-sm fa-fw mr-2 text-gray-400"></i>
            logout
        </a>
    </div>
    </li>
    </ul>
    </nav>