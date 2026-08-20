<?php

class Teacher extends Model
{
    public function login($email, $password)
    {
        $sql = "
            SELECT *
            FROM teachers
            WHERE email = ?
            LIMIT 1
        ";

        $statement = $this->db->prepare($sql);
        $statement->execute([$email]);

        $teacher = $statement->fetch(PDO::FETCH_ASSOC);

        if ($teacher && password_verify($password, $teacher['password']))
        {
            return $teacher;
        }

        return false;
    }

    public function findByEmail($email)
    {
        $sql = "
            SELECT *
            FROM teachers
            WHERE email = ?
            LIMIT 1
        ";

        $statement = $this->db->prepare($sql);
        $statement->execute([$email]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}