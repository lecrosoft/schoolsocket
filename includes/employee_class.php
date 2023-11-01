<?php
class Employee
{
    public $id;
    public $surname;
    public $firstname;
    public $middlename;
    public $admission_number;
    public $addmissionDate;
    public $dateofbirth;
    public $gender;
    public $email;
    public $religion;
    public $batch_id;
    public $student_cat_id;
    public $blood_group;
    public $student_type;
    public $photo;
    public $health_info;
    public $address;
    public $mobile_number;
    public $phone_number;
    public $state_of_origin;
    public $local_govt;
    public $nationalty;
    public $tmp_file;
    public $user_type = "Student";
    public $user_role = "Student";
    public $username;
    public $password;
    public $folder;



    public static function fetchAllEmployee()
    {
        $sql = self::findThisQuery("SELECT * FROM user WHERE user_type = 'Employee' AND status = 'Active' ");
        return $sql;
    }
    public static function fetchAny($data)
    {
        $sql = self::findThisQuery($data);
        return $sql;
    }
    public static function fetchEmployeeById($user_id)
    {
        global $db;
        $result_set = self::findThisQuery("SELECT * FROM user WHERE user_id = $user_id LIMIT 1");
        return !empty($result_set) ? array_shift($result_set) : false;
    }
    public static function findThisQuery($query)
    {
        global $db;
        $result_set = $db->query($query);
        $the_object_array  = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        };
        return $the_object_array;
    }

    public static function verify_user($username, $password)
    {
        global $db;
        $username = $db->excape_string($username);
        $password = $db->excape_string($password);
        $sql = "SELECT * FROM user WHERE ";
        $sql .= "username ='{$username}' ";
        $sql .= "AND password ='{$password}' ";
        $sql .= "LIMIT 1";
        $result_set = self::findThisQuery($sql);

        return !empty($result_set) ? $result_set : false;
    }
    public static function instantiation($theRecord)
    {
        $the_object = new Employee();
        foreach ($theRecord as $attribute  => $value) {
            if ($the_object->hasAttribute($attribute)) {
                $the_object->$attribute = $value;
            }
        }
        return $the_object;
    }

    public  function create()
    {
        global $db;
        // $this->surname = $_POST['surname'];
        // $this->firstname = $_POST['firstname'];
        // $this->middlename = $_POST['middlename'];
        // $this->dateofbirth = $_POST['dateofbirth'];
        // $this->gender = $_POST['gender'];
        // $this->email = $_POST['email'];
        // $this->religion = $_POST['religion'];
        // $this->addmissionDate = $_POST['addmissionDate'];
        // $this->batch_id = $_POST['batch_id'];
        // $this->student_cat_id = $_POST['student_cat_id'];
        // $this->blood_group = $_POST['blood_group'];
        // $this->student_type = $_POST['student_type'];
        // $this->photo = $_FILES['photo']['name'];
        // $this->tmp_file = $_FILES['photo']['tmp_name'];
        // $this->health_info = $_POST['health_info'];
        // $this->address = $_POST['address'];
        // $this->mobile_number = $_POST['mobile_number'];
        // $this->phone_number = $_POST['phone_number'];
        // $this->state_of_origin = $_POST['state_of_origin'];
        // $this->nationalty = $_POST['nationalty'];
        // $this->local_govt = $_POST['local_govt'];
        // $this->batch_id = $_POST['batch_id'];
        // $this->student_cat_id = $_POST['student_cat_id'];
        // $this->email = $_POST['email'];
        // $this->address = $_POST['address'];
        // $this->health_info = $_POST['health_info'];
        // $this->username = 's' . $this->id;
        // $this->password = $this->username . '123';



        $sql = "INSERT INTO `user`(`surname`, `first_name`, `middle_name`, `admission_number`, `admission_date`, `date_of_birth`, `gender`, `user_type`, `user_role`, `religion`, `blood_group_id`, `nationality_id`, `state_of_origin_id`, `local_gov_of_origin`, `batch_id`, `student_category_id`,`student_type`, `email`, `mobile_number`, `phone_no`, `address`, `health_info`,`photo`) ";
        $sql .= "VALUES ('";
        $sql .= $this->surname . "','";
        $sql .= $this->firstname . "','";
        $sql .= $this->middlename . "','";
        $sql .= $this->admission_number . "','";
        $sql .= $this->addmissionDate . "','";
        $sql .= $this->dateofbirth . "','";
        $sql .= $this->gender . "','";
        $sql .= $this->user_type . "','";
        $sql .= $this->user_role . "','";
        $sql .= $this->religion . "','";
        $sql .= $this->blood_group . "','";
        $sql .= $this->nationalty . "','";
        $sql .= $this->state_of_origin . "','";
        $sql .= $this->local_govt . "','";
        $sql .= $this->batch_id . "','";
        $sql .= $this->student_cat_id . "','";
        $sql .= $this->student_type . "','";
        $sql .= $this->email . "','";
        $sql .= $this->mobile_number . "','";
        $sql .= $this->phone_number . "','";
        $sql .= $this->address . "','";
        $sql .= $this->health_info . "','";
        $sql .= $this->photo . "''";
        $sql .= ")";

        $querySql = mysqli_query($db->con, $sql);
        if ($querySql) {
            global $global;
            $this->id = $db->the_insert_id();
            $sql = self::fetchEmployeeById($this->id);
            $query_sql = $db->query($sql);
            $username = 's' .  $this->id;
            $password = $username . '123';
            $sqlupdate = "UPDATE user SET `username` = $username,`password` = $password";
            $query_update = $db->query($sqlupdate);
            // return true;

            echo "Success";
        } else {
            return false;
            die('QUERY ERROR' . mysqli_error($db->con));
        }
    }

    private function hasAttribute($attribute)
    {
        $object_variables = get_object_vars($this);
        return array_key_exists($attribute, $object_variables);
    }

    public static function submit()
    {
        global $db;

        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $dateofbirth = $_POST['dateofbirth'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $religion = $_POST['religion'];
        $addmissionDate = $_POST['addmissionDate'];
        $batch_id = $_POST['batch_id'];
        $student_cat_id = $_POST['student_cat_id'];
        $blood_group = $_POST['blood_group'];
        $student_type = $_POST['student_type'];
        $photo = $_FILES['photo']['name'];
        $tmp_file = $_FILES['photo']['tmp_name'];
        $health_info = $_POST['health_info'];
        $address = $_POST['address'];
        $mobile_number = $_POST['mobile_number'];
        $phone_number = $_POST['phone_number'];
        $state_of_origin = $_POST['state_of_origin'];
        $nationalty = $_POST['nationalty'];
        $local_govt = $_POST['local_govt'];
        $batch_id = $_POST['batch_id'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $health_info = $_POST['health_info'];
    }
}
$user = new Employee();
