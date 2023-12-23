<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="<?= base_url('assets/img/avatars/avatar3.png') ?>" class="avatar img-fluid rounded me-1" alt="<?= $user['fullname']; ?>" /> <span class="text-dark"><?= $user['fullname']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal" data-user-id="<?= session()->get('userID'); ?>" data-username="<?= session()->get('username'); ?>">
                        <i class="align-middle me-1" data-feather="user"></i> Profile
                    </a>
                    <a class="dropdown-item <?= 'disabled'; ?>" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item <?= 'disabled'; ?>" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                    <a class="dropdown-item <?= 'disabled'; ?>" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('Welcome/logout'); ?> ">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>