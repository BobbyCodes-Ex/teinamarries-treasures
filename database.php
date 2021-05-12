<?php

// $tableName = "treasuresform_responses";

function get_db_connection(){
    $ini_data = parse_ini_file("db.ini");
    
    try {
        $conn = new PDO("mysql:host=$ini_data[serverName];dbname=$ini_data[dbName]", $ini_data["userName"], $ini_data["password"]);
        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}

function create_table($nameOftable){
    $conn = get_db_connection();
    try {
        // sql to create table
        $sql = "CREATE TABLE $nameOftable (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                date TIMESTAMP,
                full_name VARCHAR(255),
                email VARCHAR(255),
                phone_number VARCHAR(255),
                company VARCHAR(255),
                reason_for_contact VARCHAR(255),
                sent_message VARCHAR(255)
            )";
        
        $conn->exec($sql);
        echo "Table $nameOftable created successfully";
    } catch(PDOException $e) {
        echo "Failed to create table: " . $e->getMessage();
    }  
    $conn = null;
}

function contact_form_insert($nameOftable, $name, $email, $phone, $company, $reasonForContact, $message){
    $conn = get_db_connection();
    try {
        $sql = "INSERT INTO $nameOftable (
            date, full_name, email, phone_number, company, reason_for_contact, sent_message
            ) VALUES (
            NOW(), '$name', '$email', '$phone', '$company', '$reasonForContact', '$message'
            )";

        $conn->exec($sql);
        //echo "<br>Inserted Successfully";
    } catch (PDOException $e){
        //echo $sql . "<br>Failed to insert: " . $e->getMessage();
    }
    $conn = null;
}

function get_content($nameOftable){
    $conn = get_db_connection();
    try{
        $stmt = $conn->prepare("SELECT * FROM $nameOftable");
        $stmt->execute();
        // return $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // print_r($stmt->fetchAll());

        foreach($stmt->fetchAll() as $row) { 
            foreach($row as $data){
                echo '<br>'.$data;
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>