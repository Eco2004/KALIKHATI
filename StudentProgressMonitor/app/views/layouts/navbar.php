<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="/StudentProgressMonitor/dashboard">

            <i class="bi bi-mortarboard-fill me-2"></i>
            Student Progress Monitor

        </a>

        <?php if (isset($_SESSION['teacher_id'])): ?>

            <div class="ms-auto d-flex align-items-center">

                <span class="text-white me-3">

                    <i class="bi bi-person-circle me-1"></i>

                    Welcome,
                    <?= htmlspecialchars($_SESSION['teacher_name']); ?>

                </span>

                <a
                    href="/StudentProgressMonitor/login/logout"
                    class="btn btn-light btn-sm">

                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout

                </a>

            </div>

        <?php endif; ?>

    </div>

</nav>