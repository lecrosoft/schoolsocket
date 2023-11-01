<?php
function getDateDifferenceExcludingWeekends($date1, $date2)
{
    // Convert input dates to PHP DateTime objects
    $startDate = new DateTime($date1);
    $endDate = new DateTime($date2);

    // Calculate total number of days between dates
    $totalDays = floor(($endDate->format('U') - $startDate->format('U')) / (60 * 60 * 24)) + 1;

    // Calculate number of weekend days (Saturday and Sunday)
    $weekendDays = 0;
    for ($i = 0; $i < $totalDays; $i++) {
        $currentDate = new DateTime($startDate->format('Y-m-d'));
        $currentDate->modify("+$i day");
        $currentDayOfWeek = $currentDate->format('N');
        if ($currentDayOfWeek == 6 || $currentDayOfWeek == 7) {
            $weekendDays++;
        }
    }

    // Subtract weekend days from total days to get business days
    $businessDays = $totalDays - $weekendDays;

    return $businessDays;
}


$numberOfDaySchoolOpen = "";

$sql = "SELECT * FROM `term` WHERE `status` = 'Active'";
$query_sql = $db->query($sql);
$row = mysqli_fetch_assoc($query_sql);
extract($row);
$current_term = $term_name;
$current_term_id = $term_id;
$sql_holiday = "SELECT * FROM `event`  WHERE `is_holiday` = 'YES'";
$query_sql_holiday = $db->query($sql_holiday);
$count_holiday = mysqli_num_rows($query_sql_holiday);



$current_term = $term_name;
$current_term_id = $term_id;

// Current sesion
$session_sql = "SELECT * FROM `academy_session` WHERE `status` = 'Active'";
$query_session_sql = $db->query($session_sql);
$row = mysqli_fetch_assoc($query_session_sql);
extract($row);
$current_session = $session_title;
$current_session_id = $session_id;
$fristTermStartDate = $first_term_start;
$firstTermEndDate = $first_term_end;
$secondTermStartDate = $second_term_start;
$secondTermEndDate = $second_term_end;
$thirdTermStartDate = $third_term_start;
$thirdTermEndDate = $third_term_end;
if ($current_term_id == 1) {
    $numberOfDaySchoolOpen = getDateDifferenceExcludingWeekends($fristTermStartDate, $firstTermEndDate) - $count_holiday;
} else if ($current_term_id == 2) {
    $numberOfDaySchoolOpen = getDateDifferenceExcludingWeekends($secondTermStartDate, $secondTermEndDate) - $count_holiday;
} else if ($current_term_id == 3) {
    $numberOfDaySchoolOpen = getDateDifferenceExcludingWeekends($thirdTermStartDate, $thirdTermEndDate) - $count_holiday;
}
$currency_symbol = GlobalClass::getColumn('currency_symbol', 'general_settings');
$school_name = GlobalClass::getColumn('school_name', 'general_settings');
$motto = GlobalClass::getColumn('motto', 'general_settings');
$school_address = GlobalClass::getColumn('address', 'general_settings');
$school_phone_number = GlobalClass::getColumn('phone_number', 'general_settings');
$school_phone_number_two = GlobalClass::getColumn('phone_number_two', 'general_settings');
$school_email = GlobalClass::getColumn('email', 'general_settings');
$logo = GlobalClass::getColumn('logo', 'general_settings');
$principal_signature = GlobalClass::getColumn('principal_signature', 'general_settings');

$student_number = Students::fetchAllStudents();
$countStudent = count($student_number);
$employee_number = Employee::fetchAllEmployee();
$countEmployee = count($employee_number);
$active_employee = Employee::fetchAny("SELECT `user_type` FROM user WHERE `user_type` = 'Employee' AND `user`.`status` ='Active'");
$countActiveEmployee = count($active_employee);
$inActive_employee = Employee::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Employee' AND `user`.`status` !='Active'");
$countInActive_employee = count($inActive_employee);
$male_staff = Employee::fetchAny("SELECT `user_type`,`gender` FROM user WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`gender` ='Male'");
$countMale_staff = count($male_staff);
$female_staff = Employee::fetchAny("SELECT `user_type`,`gender` FROM user WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`gender` ='Female'");
$countFemale_staff = count($female_staff);
$academy_staff = Employee::fetchAny("SELECT `user_type`,`staff_type` FROM user WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`staff_type` ='Teaching Staff'");
$countAcademy_staff = count($academy_staff);
$nonAcademy_staff = Employee::fetchAny("SELECT `user_type`,`staff_type` FROM user WHERE `user_type` = 'Employee' AND `user`.`status` ='Active' AND `user`.`staff_type` ='Non Teaching Staff'");
$countNonAcademy_staff = count($nonAcademy_staff);


$guardian_number = Guardian::fetchAllGuardian();
$countGuardian = count($guardian_number);
$active_guardian = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Guardian' AND `user`.`status` ='Active'");
$countActiveGuardian = count($active_guardian);
$in_active_guardian = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Guardian' AND `user`.`status` !='Active'");
$countInActiveGuardian = count($in_active_guardian);
$male_Guardian = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Guardian' AND `gender` ='Male'");
$countMale_guardian = count($male_Guardian);
$female_Guardian = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Guardian' AND `gender` ='Female'");
$countFemale_guardian = count($female_Guardian);




$active_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `user`.`status` ='Active'");
$countActiveStudent = count($active_student);
$inActive_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `user`.`status` !='Active'");
$countInActive_student = count($inActive_student);
$male_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `gender` ='Male'");
$countMale_student = count($male_student);
$female_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `gender` ='Female'");
$countFemale_student = count($female_student);
$linked_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `user`.`status` ='Active' AND `linked_status` ='Linked'");
$countLinked_student = count($linked_student);
$unlinked_student = Students::fetchAny("SELECT `user_type`FROM user WHERE `user_type` = 'Student' AND `user`.`status` ='Active' AND `linked_status` IS NULL");
$countUnLinked_student = count($unlinked_student);
