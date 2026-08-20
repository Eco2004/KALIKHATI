<?php

class Student extends Model
{
    public function getAllStudents()
    {
        $sql = "
            SELECT
                student_id,
                lrn,
                first_name,
                middle_name,
                last_name,
                grade_level,
                section
            FROM students
            ORDER BY last_name ASC
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalStudents()
    {
        $sql = "SELECT COUNT(*) AS total FROM students";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getLeaderboard()
    {
        $sql = "
            SELECT
                students.first_name,
                students.middle_name,
                students.last_name,
                student_progress.coins
            FROM students
            INNER JOIN student_progress
                ON students.student_id = student_progress.student_id
            ORDER BY student_progress.coins DESC
            LIMIT 10
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
        public function searchStudents($search = "", $grade = "", $section = "")
    {
        $sql = "
            SELECT *
            FROM students
            WHERE 1=1
        ";

        $parameters = [];

        if(!empty($search))
        {
            $sql .= "
                AND
                (
                    lrn LIKE ?
                    OR first_name LIKE ?
                    OR middle_name LIKE ?
                    OR last_name LIKE ?
                )
            ";

            $searchValue = "%".$search."%";

            $parameters[] = $searchValue;
            $parameters[] = $searchValue;
            $parameters[] = $searchValue;
            $parameters[] = $searchValue;
        }

        if(!empty($grade))
        {
            $sql .= " AND grade_level = ? ";

            $parameters[] = $grade;
        }

        if(!empty($section))
        {
            $sql .= " AND section = ? ";

            $parameters[] = $section;
        }

        $sql .= " ORDER BY last_name ASC";

        $statement = $this->db->prepare($sql);

        $statement->execute($parameters);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    // Students who may need additional assistance
    public function getStudentsNeedingAttention()
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
                student_progress.last_played
            FROM students
            INNER JOIN student_progress
                ON students.student_id = student_progress.student_id
            WHERE
                student_progress.last_played IS NULL
                OR student_progress.last_played < DATE_SUB(NOW(), INTERVAL 7 DAY)
                OR student_progress.lands_unlocked <= 2
            ORDER BY student_progress.last_played ASC
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
