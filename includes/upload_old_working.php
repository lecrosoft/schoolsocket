<?php
$response = array('message' => '', 'status' => 0);
require_once('init.php');
// ... Previous code to connect to the database ...

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
    // Read the remaining rows
    while (($rowData = fgetcsv($file)) !== false) {
        // Assign values to the variables dynamically based on the column headers
        foreach ($columnHeaders as $index => $columnHeader) {
            if (isset($rowData[$index])) {
                if ($columnHeader === 'date_created') {
                    // Format the date_created value as per your requirements
                    $date_created = date('Y-m-d', strtotime($rowData[$index]));
                } elseif ($columnHeader === 'date_of_birth') {
                    // Format the date_of_birth value as per your requirements
                    $date_of_birth = date('Y-m-d', strtotime($rowData[$index]));
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
    }

    // Close the CSV file
    fclose($file);


    // Close the CSV
    fclose($file);

    // Check if any rows were inserted
    $affectedRows = mysqli_stmt_affected_rows($stmt);
    if ($affectedRows > 0) {
        $response['message'] = 'File uploaded successfully. Inserted ' . $affectedRows . ' rows.';
        $response['status'] = 1;
    } else {
        $response['message'] = 'No rows inserted.';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    $response['message'] = 'Error uploading file.';
}

// Return the response as JSON
echo json_encode($response);
