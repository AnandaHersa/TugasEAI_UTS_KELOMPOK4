<?php
header('Content-Type: application/json');

// Menambahkan CORS headers untuk memungkinkan permintaan dari origin lain
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Data dokter (simulasi, bisa diganti dengan database)
$doctors = [
    ["id" => 1, "name" => "Dr. Emily Williams", "specialty" => "Cardiologist", "contact" => "9876543210"],
    ["id" => 2, "name" => "Dr. Michael Johnson", "specialty" => "Neurologist", "contact" => "1234432110"]
];

// Endpoint GET /doctors (mengambil data dokter)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/doctors') {
    echo json_encode($doctors);
    exit;
}

// Endpoint POST /doctors (menambah data dokter)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/doctors') {
    $input = json_decode(file_get_contents('php://input'), true);
    $newDoctor = [
        "id" => count($doctors) + 1,
        "name" => $input['name'],
        "specialty" => $input['specialty'],
        "contact" => $input['contact']
    ];
    $doctors[] = $newDoctor;
    echo json_encode(["status" => "success", "message" => "Doctor added successfully"]);
    exit;
}
?>
