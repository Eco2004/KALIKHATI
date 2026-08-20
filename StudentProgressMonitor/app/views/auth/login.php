<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white text-center">

                    <h3>Teacher Login</h3>

                </div>

                <div class="card-body">

    <?php if(isset($_GET['error'])): ?>

        <div class="alert alert-danger">

            Invalid email or password.

        </div>

    <?php endif; ?>

    <form method="POST" action="/StudentProgressMonitor/login/authenticate">

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter your Gmail"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter your password"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-success w-100">

            Login

        </button>

    </form>

</div>

            </div>

        </div>

    </div>

</div>