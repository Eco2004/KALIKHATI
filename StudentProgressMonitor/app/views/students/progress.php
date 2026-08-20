<?php

// Calculate overall progress
$lands = (int) $student['lands_unlocked'];
$houses = (int) $student['houses'];
$trees = (int) $student['trees'];
$coins = (int) $student['coins'];

// Maximum/reference values for the game
$landScore = min($lands / 10, 1);
$houseScore = min($houses / 10, 1);
$treeScore = min($trees / 50, 1);
$coinScore = min($coins / 5000, 1);

// Calculate percentage
$progress = round(
    (($landScore + $houseScore + $treeScore + $coinScore) / 4) * 100
);

// Determine status
if ($progress >= 70) {

    $status = "Good Progress";
    $statusClass = "bg-success";
    $statusIcon = "🟢";

} elseif ($progress >= 40) {

    $status = "Needs Monitoring";
    $statusClass = "bg-warning text-dark";
    $statusIcon = "🟡";

} else {

    $status = "Needs Assistance";
    $statusClass = "bg-danger";
    $statusIcon = "🔴";
}

?>

<div class="container mt-4">

    <<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2 class="mb-0">Student Progress</h2>

        <a href="/StudentProgressMonitor/dashboard"
           class="btn btn-success">

            ← Back to Dashboard

        </a>

    </div>

    <hr>

    <!-- Student Information -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-success text-white">
            <strong>Student Information</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-2">
                    <strong>LRN:</strong>
                    <?= htmlspecialchars($student['lrn']); ?>
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Name:</strong>
                    <?= htmlspecialchars($student['first_name']); ?>
                    <?= htmlspecialchars($student['middle_name']); ?>
                    <?= htmlspecialchars($student['last_name']); ?>
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Grade:</strong>
                    Grade <?= htmlspecialchars($student['grade_level']); ?>
                </div>

                <div class="col-md-6 mb-2">
                    <strong>Section:</strong>
                    <?= htmlspecialchars($student['section']); ?>
                </div>

            </div>

        </div>

    </div>


    <!-- Overall Progress -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-success text-white">
            <strong>Overall Progress</strong>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between mb-2">

                <strong>Waste Segregation Game Progress</strong>

                <strong>
                    <?= $progress; ?>%
                </strong>

            </div>

            <div class="progress"
                 style="height: 25px;">

                <div
                    class="progress-bar <?= $statusClass; ?>"
                    role="progressbar"
                    style="width: <?= $progress; ?>%;"
                    aria-valuenow="<?= $progress; ?>"
                    aria-valuemin="0"
                    aria-valuemax="100">

                    <?= $progress; ?>%

                </div>

            </div>

            <div class="mt-3">

    <span class="badge <?= $statusClass; ?> fs-6">

        <?= $statusIcon; ?>

        <?= $status; ?>

    </span>

</div>

<div class="mt-3 p-3 bg-light rounded">

    <strong>Teacher Assessment:</strong>

    <?php if ($progress >= 70): ?>

        <p class="mb-0 mt-1">
            The student is showing good progress in the
            waste segregation educational game. Continue
            encouraging the student to participate and
            improve their game activities.
        </p>

    <?php elseif ($progress >= 40): ?>

        <p class="mb-0 mt-1">
            The student is making some progress but may
            benefit from additional monitoring and
            encouragement to participate more consistently.
        </p>

    <?php else: ?>

        <p class="mb-0 mt-1">
            The student is showing limited progress and
            may need additional assistance or encouragement
            from the teacher.
        </p>

    <?php endif; ?>

</div>

        </div>

    </div>


    <!-- Waste Segregation Progress -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-success text-white">

            <strong>Waste Segregation Progress</strong>

        </div>

        <div class="card-body">

            <p class="text-muted mb-4">

                The following indicators show the student's
                progress while playing the waste segregation
                educational game.

            </p>

            <div class="row">

                <!-- Coins -->
                <div class="col-md-4 mb-3">

                    <div class="card text-center h-100">

                        <div class="card-body">

                            <h5>🪙 Coins</h5>

                            <h2 class="text-success">
                                <?= number_format($student['coins']); ?>
                            </h2>

                            <small class="text-muted">
                                Earned coins
                            </small>

                        </div>

                    </div>

                </div>


                <!-- Lands -->
                <div class="col-md-4 mb-3">

                    <div class="card text-center h-100">

                        <div class="card-body">

                            <h5>🗺️ Lands Unlocked</h5>

                            <h2 class="text-success">
                                <?= $student['lands_unlocked']; ?>
                            </h2>

                            <small class="text-muted">
                                Areas unlocked
                            </small>

                        </div>

                    </div>

                </div>


                <!-- Houses -->
                <div class="col-md-4 mb-3">

                    <div class="card text-center h-100">

                        <div class="card-body">

                            <h5>🏠 Houses Built</h5>

                            <h2 class="text-success">
                                <?= $student['houses']; ?>
                            </h2>

                            <small class="text-muted">
                                Houses placed
                            </small>

                        </div>

                    </div>

                </div>


    

                <!-- Last Played -->
                <div class="col-md-4 mb-3">

                    <div class="card text-center h-100">

                        <div class="card-body">

                            <h5>🕒 Last Played</h5>

                            <p class="mt-3 mb-0">
                                <?= htmlspecialchars($student['last_played']); ?>
                            </p>

                            <small class="text-muted">
                                Latest game activity
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Progress History -->

<div class="card mb-4">

    <div class="card-header bg-success text-white">

        <strong>Progress History</strong>

    </div>

    <div class="card-body">

        <?php if (!empty($history)): ?>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Date & Time</th>

                            <th>Coins</th>

                            <th>Lands</th>

                            <th>Houses</th>

                            <th>Trees</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($history as $record): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($record['recorded_at']); ?>
                            </td>

                            <td>
                                <?= number_format($record['coins']); ?>
                            </td>

                            <td>
                                <?= $record['lands_unlocked']; ?>
                            </td>

                            <td>
                                <?= $record['houses']; ?>
                            </td>

                            <td>
                                <?= $record['trees']; ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="text-muted">

                No progress history has been recorded yet.

            </div>

        <?php endif; ?>

    </div>

</div>
</div>