<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-0 shadow">
    <div class="container">
        <a href="" class="navbar-brand"><img src="images/logo.jpg" class="w-100" alt=""></a>

        <div class="d-flex">
            <a href="" class="navbar-brand"><img src="images/digital.png" class="w-100" alt=""></a>
            <ul class="navbar-nav mt-2">
                <?php
                if (isset($_SESSION['user'])) { ?>
                <li class="nav-item"><a href="logout.php" class="btn btn-danger ms-3 mt-4"><i class="bi bi-power"></i> Logout</a>
                </li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link"><i class="bi bi-house me-2 ms-2"></i>Home</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link"><i class="bi bi-map me-2 ms-2"></i>About
                    Purnea</a></li>
            <li class="nav-item"><a href="viewAllProject.php" class="nav-link"><i class="bi bi-window-stack me-2 ms-2"></i>Projects</a>
            </li>
            <li class="nav-item"><a href="viewEvent.php" class="nav-link"><i class="bi bi-bell me-2 ms-2"></i>Events</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link"><i class="bi bi-phone me-2 ms-2"></i>Contact Us</a></li>
            <!-- <li class="nav-item"><a href="" class="nav-link"><i class="bi bi-arrow-down me-2 ms-2"></i>Notification</a> -->
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php
                if (!isset($_SESSION['user'])) { ?>
            <li class="nav-item"><a href="register.php" class="nav-link"><i
                        class="bi bi-person-plus me-2 ms-2"></i>Register</a>
            </li>
            <li class="nav-item"><a href="login.php" class="nav-link"><i
                        class="bi bi-box-arrow-in-right me-2 ms-2"></i>Login</a>
            </li>
            <?php }
                ?>
        </ul>
    </div>
</nav>