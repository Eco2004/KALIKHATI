<?php

class Progress extends Model
{
    public function getStudentProgress($studentId)
    {
        $sql = "
            SELECT

                students.student_id,
                students.lrn,
                students.first_name,
                students.middle_name,
                students.last_name,
                students.grade_level,
                students.section,

                student_progress.coins,
                student_progress.lands_unlocked,
                student_progress.houses,
                student_progress.trees,
                student_progress.fences,
                student_progress.last_played

            FROM students

            INNER JOIN student_progress

            ON students.student_id = student_progress.student_id

            WHERE students.student_id = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$studentId]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function getProgressHistory($studentId)
    {
        $sql = "
            SELECT
                history_id,
                coins,
                lands_unlocked,
                houses,
                trees,
                recorded_at
            FROM progress_history
            WHERE student_id = ?
            ORDER BY recorded_at DESC
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$studentId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}