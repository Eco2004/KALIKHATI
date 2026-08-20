<div class="container py-4">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h1 class="dashboard-title">
            Teacher Dashboard
        </h1>

        <p class="dashboard-subtitle">
            Monitor student progress and performance.
        </p>

    </div>


    <!-- =========================
         TOP DASHBOARD
         ========================= -->

    <div class="row g-4">

        <!-- TOTAL STUDENTS -->

        <div class="col-lg-4">

            <div class="card stat-card">

                <div class="card-body">

                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div class="stat-label">
                        Total Students
                    </div>

                    <div class="stat-number">
                        <?= $totalStudents['total']; ?>
                    </div>

                    <div class="stat-description">
                        Registered students
                    </div>

                </div>

            </div>

        </div>


        <!-- LEADERBOARD -->

        <div class="col-lg-8">

            <div class="card">

                <div class="section-header">

                    <div class="d-flex align-items-center">

                        <div class="stat-icon mb-0 me-3"
                             style="width:40px;height:40px;font-size:18px;">

                            <i class="bi bi-trophy-fill"></i>

                        </div>

                        <div>

                            <h5 class="section-title">
                                Leaderboard
                            </h5>

                            <p class="section-subtitle">
                                Top students by coins
                            </p>

                        </div>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table leaderboard-table">

                        <thead>

                            <tr>

                                <th>Rank</th>

                                <th>Student</th>

                                <th class="text-end">
                                    Coins
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php

                        $rank = 1;

                        foreach ($leaderboard as $player):

                            $firstLetter =
                                strtoupper(
                                    substr(
                                        $player['first_name'],
                                        0,
                                        1
                                    )
                                );

                        ?>

                            <tr>

                                <td>

                                    <span class="rank-number">

                                        <?php if ($rank == 1): ?>

                                            <i class="bi bi-trophy-fill"></i>

                                        <?php else: ?>

                                            <?= $rank; ?>

                                        <?php endif; ?>

                                    </span>

                                </td>


                                <td>

                                    <span class="student-avatar">
                                        <?= $firstLetter; ?>
                                    </span>

                                    <span class="student-name">

                                        <?= htmlspecialchars(
                                            $player['first_name']
                                        ); ?>

                                        <?= htmlspecialchars(
                                            $player['middle_name']
                                        ); ?>

                                        <?= htmlspecialchars(
                                            $player['last_name']
                                        ); ?>

                                    </span>

                                </td>


                                <td class="text-end">

                                    <span class="coins">

                                        <i class="bi bi-coin"></i>

                                        <?= number_format(
                                            $player['coins']
                                        ); ?>

                                    </span>

                                </td>

                            </tr>

                        <?php

                        $rank++;

                        endforeach;

                        ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================
         STUDENT LIST
         ========================= -->

    <div class="card search-card">

        <div class="section-header">

            <div class="d-flex align-items-center">

                <div class="stat-icon mb-0 me-3"
                     style="width:40px;height:40px;font-size:18px;">

                    <i class="bi bi-people-fill"></i>

                </div>

                <div>

                    <h5 class="section-title">
                        Student List
                    </h5>

                    <p class="section-subtitle">
                        View and monitor student progress
                    </p>

                </div>

            </div>

        </div>


        <!-- SEARCH -->

        <div class="search-body">

            <form method="GET">

                <div class="row g-3 align-items-end">

                    <!-- SEARCH -->

                    <div class="col-lg-5">

                        <label class="form-label-custom">
                            Search Student
                        </label>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search by LRN or student name"
                            value="<?= htmlspecialchars($search); ?>">

                    </div>


                    <!-- GRADE -->

                    <div class="col-lg-3">

                        <label class="form-label-custom">
                            Grade Level
                        </label>

                        <select
                            name="grade"
                            class="form-select">

                            <option value="">
                                All Grade Levels
                            </option>

                            <option
                                value="4"
                                <?= ($grade == "4")
                                    ? "selected"
                                    : ""; ?>>

                                Grade 4

                            </option>

                            <option
                                value="5"
                                <?= ($grade == "5")
                                    ? "selected"
                                    : ""; ?>>

                                Grade 5

                            </option>

                            <option
                                value="6"
                                <?= ($grade == "6")
                                    ? "selected"
                                    : ""; ?>>

                                Grade 6

                            </option>

                        </select>

                    </div>


                    <!-- SECTION -->

                    <div class="col-lg-2">

                        <label class="form-label-custom">
                            Section
                        </label>

                        <select
                            name="section"
                            class="form-select">

                            <option value="">
                                All Sections
                            </option>

                            <option
                                value="Mabini"
                                <?= ($section == "Mabini")
                                    ? "selected"
                                    : ""; ?>>

                                Mabini

                            </option>

                            <option
                                value="Bonifacio"
                                <?= ($section == "Bonifacio")
                                    ? "selected"
                                    : ""; ?>>

                                Bonifacio

                            </option>

                            <option
                                value="Rizal"
                                <?= ($section == "Rizal")
                                    ? "selected"
                                    : ""; ?>>

                                Rizal

                            </option>

                        </select>

                    </div>


                    <!-- SEARCH BUTTON -->

                    <div class="col-lg-2">

                        <button
                            type="submit"
                            class="btn btn-search">

                            <i class="bi bi-search"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>


        <!-- STUDENT TABLE -->

        <div class="student-list">

            <div class="table-responsive">

                <table class="table student-table">

                    <thead>

                        <tr>

                            <th>LRN</th>

                            <th>Student Name</th>

                            <th>Grade Level</th>

                            <th>Section</th>

                            <th class="text-end">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php foreach ($students as $student): ?>

                        <tr>

                            <!-- LRN -->

                            <td>

                                <?= htmlspecialchars(
                                    $student['lrn']
                                ); ?>

                            </td>


                            <!-- STUDENT NAME -->

                            <td>

                                <span class="student-avatar">

                                    <?= strtoupper(
                                        substr(
                                            $student['first_name'],
                                            0,
                                            1
                                        )
                                    ); ?>

                                </span>

                                <span class="student-name">

                                    <?= htmlspecialchars(
                                        $student['first_name']
                                    ); ?>

                                    <?= htmlspecialchars(
                                        $student['middle_name']
                                    ); ?>

                                    <?= htmlspecialchars(
                                        $student['last_name']
                                    ); ?>

                                </span>

                            </td>


                            <!-- GRADE -->

                            <td>

                                <span class="grade-badge">

                                    Grade
                                    <?= htmlspecialchars(
                                        $student['grade_level']
                                    ); ?>

                                </span>

                            </td>


                            <!-- SECTION -->

                            <td>

                                <?= htmlspecialchars(
                                    $student['section']
                                ); ?>

                            </td>


                            <!-- ACTION -->

                            <td class="text-end">

                                <a
                                    href="/StudentProgressMonitor/progress/index/<?= $student['student_id']; ?>"
                                    class="btn-progress">

                                    <i class="bi bi-eye-fill"></i>

                                    View Progress

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>