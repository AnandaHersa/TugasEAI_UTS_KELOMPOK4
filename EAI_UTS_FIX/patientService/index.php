<?php
header('Content-Type: application/json');

// Menambahkan CORS headers untuk memungkinkan permintaan dari origin lain
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Data pasien (simulasi, bisa diganti dengan database)
$patients = [
    ["id" => 1, "name" => "John Doe", "age" => 45, "gender" => "Male", "contact" => "1234567890"],
    ["id" => 2, "name" => "Jane Smith", "age" => 38, "gender" => "Female", "contact" => "0987654321"]
];

// Endpoint GET /patients (mengambil data pasien)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/patients') {
    echo json_encode($patients);
    exit;
}

// Endpoint POST /patients (menambah data pasien)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/patients') {
    $input = json_decode(file_get_contents('php://input'), true);
    $newPatient = [
        "id" => count($patients) + 1,
        "name" => $input['name'],
        "age" => $input['age'],
        "gender" => $input['gender'],
        "contact" => $input['contact']
    ];
    $patients[] = $newPatient;
    echo json_encode(["status" => "success", "message" => "Patient added successfully"]);
    exit;
}
?>
