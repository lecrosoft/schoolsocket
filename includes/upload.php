<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
require_once('generalStats.php');
// ... Previous code to connect to the database ...
$query_batch = null;
$global = $db;
// Check if a file was uploaded
if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
    // Get the temporary file path
    $tmpFilePath = $_FILES['fileInput']['tmp_name'];

    // Manually define the column headers
    $columnHeaders = ['surname', 'first_name', 'middle_name', 'admission_number', 'date_created', 'date_of_birth', 'gender', 'user_type', 'user_role', 'religion', 'blood_group_id', 'nationality_id', 'state_of_origin_id', 'local_gov_of_origin', 'batch_id', 'student_category_id', 'student_type', 'email', 'mobile_number', 'address', 'health_info', 'photo'];

    // Prepare the INSERT query and parameter placeholders
    $tableColumns = implode(', ', $columnHeaders);
    $parameterPlaceholders = implode(', ', array_fill(0, count($columnHeaders), '?'));

    $query = "INSERT INTO user ($tableColumns) VALUES ($parameterPlaceholders)";
    $stmt = mysqli_prepare($db->con, $query);

    // Verify that the statement was prepared successfully
    if (!$stmt) {
        die('Error: ' . mysqli_error($db->con));
    }

    // Determine the data types for the columns
    $columnTypes = ['s', 's', 's', 's', 's', 's', 's', 's', 's', 's', 'i', 'i', 'i', 's', 'i', 'i', 's', 's', 's', 's', 's', 's'];

    // Specify the data types for date_of_birth and date_created as 's'
    $columnTypes[array_search('date_of_birth', $columnHeaders)] = 's';
    $columnTypes[array_search('date_created', $columnHeaders)] = 's';

    // Bind parameters dynamically based on the number of columns and their data types
    $bindParams = array();
    $bindParams[] = implode('', $columnTypes); // Combine the data types into a string
    foreach ($columnHeaders as $columnHeader) {
        $bindParams[] = &$$columnHeader;
    }

    // Bind the parameters
    if (!call_user_func_array(array($stmt, 'bind_param'), $bindParams)) {
        die('Error binding parameters: ' . mysqli_stmt_error($stmt));
    }

    // Open the CSV file
    $file = fopen($tmpFilePath, 'r');

    // Skip the first row if it contains column headers
    fgetcsv($file);

    // Read the remaining rows
    while (($rowData = fgetcsv($file)) !== false) {
        // Assign values to the variables dynamically based on the column headers
        // Assign values to the variables dynamically based on the column headers
        foreach ($columnHeaders as $index => $columnHeader) {
            if (isset($rowData[$index])) {
                if ($columnHeader === 'date_created') {
                    // Format the date_created value as per your requirements
                    $date_created = date('Y-m-d', strtotime($rowData[$index]));
                } elseif ($columnHeader === 'date_of_birth') {
                    // Format the date_of_birth value as per your requirements
                    $date_of_birth = date('Y-m-d', strtotime($rowData[$index]));
                } elseif ($columnHeader === 'batch_id') {
                    // Assign the batch_id value to the variable $batch_id
                    $batch_id = $rowData[$index];
                    // $batch_id = $batch_id;
                } else {
                    $$columnHeader = $rowData[$index];
                }
            } else {
                // Handle the case when the column value is missing in the CSV file
                // You can assign a default value or handle the situation accordingly
                $$columnHeader = '';
            }
        }




        // Execute the INSERT statement
        if (!mysqli_stmt_execute($stmt)) {
            die('Error executing statement: ' . mysqli_stmt_error($stmt));
        }

        // Perform additional operations on each student
        if ($stmt) {
            global $global;
            $id = $db->the_insert_id();
            $this_user_id = $id;
            // $sqlUser = $user->fetchUserById($id);
            // move_uploaded_file($tmp_file, $folder . $photo);
            $username = 's' . $id;
            $password = $username . '123';
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sqlupdate = "UPDATE user SET `username` = '" . $username . "',`password` = '" . $hashed_password . "' WHERE `user`.`user_id` = '" . $id . "'";
            $query_update = $db->query($sqlupdate);

            if ($query_update) {
                $add_to_batch_sql = "INSERT INTO `batch_student_list`(`user_id`, `batch_id`, `term_id`) ";
                $add_to_batch_sql .= "VALUES ('";
                $add_to_batch_sql .= $id . "','";
                $add_to_batch_sql .= $batch_id . "','";
                $add_to_batch_sql .= $current_term_id . "'";
                $add_to_batch_sql .= ")";
                $query_add_to_batch_sql = mysqli_query($db->con, $add_to_batch_sql);

                if ($query_add_to_batch_sql) {

                    if (!empty($batch_id)) {
                        $update_batch = "UPDATE `batch` SET `batch`.`student_count` = `batch`.`student_count`+1 
WHERE `batch`.`batch_id` = '" . $batch_id . "'";
                        $query_batch = mysqli_query($db->con, $update_batch);
                    } else {
                        $response['message'] = 'Error: Invalid batch ID';
                    }
                }
                if ($query_batch) {
                    $invoice_sql = "SELECT * FROM `batch` WHERE `batch_id` = $batch_id";
                    $queryInvoice_Sql = mysqli_query($db->con, $invoice_sql);
                    $row = mysqli_fetch_assoc($queryInvoice_Sql);
                    extract($row);
                    if ($invoice == "Configured") {

                        $fetch_invoice_sum = "SELECT SUM(total) as total FROM `invoice` 
WHERE `session_id` = '" . $current_session_id . "' 
AND `term_id` = '" . $current_term_id . "' AND batch_id = '" . $batch_id . "' 
AND `invoice`.`type` = 'Compulsary'";
                        $query_invoice_fetch = mysqli_query($db->con, $fetch_invoice_sum);
                        $row = mysqli_fetch_assoc($query_invoice_fetch);
                        $totalFees = $row['total'];

                        $update_student = "UPDATE `user` SET `user`.`total_fees` = `user`.`total_fees`+ '" . $totalFees . "' 
WHERE `user`.`user_type` = 'Student' AND `user`.`batch_id` = '" . $batch_id . "' 
AND `user`.`user_id` = '" . $id . "'";
                        $querySqlUpdate_student = mysqli_query($db->con, $update_student);

                        $sql = "INSERT INTO `termly_fee_summary`(`user_id`, `batch_id`, `session_id`, `term_id`, `total_fees` ) ";
                        $sql .= "VALUES ('";
                        $sql .= $id . "','";
                        $sql .= $batch_id . "','";
                        $sql .= $current_session_id . "','";
                        $sql .= $current_term_id . "','";
                        $sql .= $totalFees . "'";
                        $sql .= ")";
                        $query_Sql = mysqli_query($db->con, $sql);

                        if ($query_Sql) {
                            $invoice_sql = "SELECT * FROM `invoice` WHERE `invoice`.`session_id` = '" . $current_session_id . "' AND `invoice`.`term_id` = '" . $current_term_id . "' AND `invoice`.`batch_id` = '" . $batch_id . "'";
                            $query_invoice_sql = mysqli_query($db->con, $invoice_sql);
                            $count_invoice_sql = mysqli_num_rows($query_invoice_sql);
                            if ($count_invoice_sql > 0) {
                                while ($row = mysqli_fetch_assoc($query_invoice_sql)) {
                                    extract($row);
                                    $student_invoice_sql = "INSERT INTO `student_invoice`(`user_id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `type`, `note`, `batch_id`) ";
                                    $student_invoice_sql .= "VALUES ('";
                                    $student_invoice_sql .= $this_user_id . "','";
                                    $student_invoice_sql .= $current_session_id . "','";
                                    $student_invoice_sql .= $current_term_id . "','";
                                    $student_invoice_sql .= $item_id . "','";
                                    $student_invoice_sql .= $price . "','";
                                    $student_invoice_sql .= $quantity . "','";
                                    $student_invoice_sql .= $total . "','";
                                    $student_invoice_sql .= $type . "','";
                                    $student_invoice_sql .= $note . "','";
                                    $student_invoice_sql .= $batch_id . "'";
                                    $student_invoice_sql .= ")";
                                    $query_student_invoice_sql = mysqli_query($db->con, $student_invoice_sql);
                                }
                            }
                        }

                        // Check if subject already exists for batch and term
                        $checkSubject = "SELECT * FROM `batch_subject` WHERE `batch_subject`.`batch_id` = '$batch_id' AND `term_id` = '$current_term_id'";
                        $querySubjectSql = mysqli_query($db->con, $checkSubject);
                        $countSubject = mysqli_num_rows($querySubjectSql);
                        if ($countSubject > 0) {
                            while ($row = mysqli_fetch_assoc($querySubjectSql)) {
                                extract($row);

                                $single_subject_sql = "INSERT INTO `student_offering_subject`
                                (`user_id`, `subject_id`, `batch_id`, `term_id`, `elective`) 
                                VALUES ('$this_user_id','$subject_id','$batch_id','$term_id','$elective')";
                                $querySingle_subject_sql = mysqli_query($db->con, $single_subject_sql);
                            }
                        }
                    }


                    $response['status'] = 1;
                    $response['message'] = 'File uploaded successfully';
                }
            }
        }
    }

    // Close the CSV file and the database connection
    fclose($file);
    mysqli_stmt_close($stmt);
    mysqli_close($db->con);
} else {
    $response['message'] = 'Error uploading file: ' . $_FILES['fileInput']['error'];
}

// Send the JSON response back to the client
echo json_encode($response);
