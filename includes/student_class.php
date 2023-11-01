<?php

class Students
{
    public $firstname;
    public $surname;

    public static function fetchAllStudents()
    {
        $sql = self::findThisQuery("SELECT * FROM user WHERE user_type = 'student' ");
        return $sql;
    }
    public static function fetchAny($data)
    {
        $sql = self::findThisQuery($data);
        return $sql;
    }
    public static function fetchStudentById($student_id)
    {
        global $db;
        $sql = self::findThisQuery("SELECT * FROM user WHERE user_id = $student_id AND user_type = 'student' AND status = 'Active' LIMIT 1");
        // $foundStudent = mysqli_fetch_array($sql_result);
        return $sql;
    }
    public static function findThisQuery($query)
    {
        global $db;
        $sql = $db->query($query);
        $the_object_arrraay  = array();
        while ($row = mysqli_fetch_array($sql)) {
            $the_object_arrraay[] = self::instatiation($row);
        };

        return $the_object_arrraay;
    }
    public static function instatiation($theRecord)
    {
        $the_object = new Students();
        foreach ($theRecord as $attribute  => $value) {
            if ($the_object->hasAttribute($attribute)) {
                $the_object->$attribute = $value;
            }
        }
        return $the_object;
    }



    private function hasAttribute($attribute)
    {
        $object_variables = get_object_vars($this);
        return array_key_exists($attribute, $object_variables);
    }
}
