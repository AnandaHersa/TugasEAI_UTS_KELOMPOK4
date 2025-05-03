<?php
header('Content-Type: application/json');

// Menambahkan CORS headers untuk memungkinkan permintaan dari origin lain
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Data janji temu (simulasi, bisa diganti dengan database)
$appointments = [
    ["appointment_id" => 1, "patient_name" => "John Doe", "doctor_name" => "Dr. Michael Johnson", "appointment_date" => "2025-06-15T10:00:00"],
    ["appointment_id" => 2, "patient_name" => "Alice Brown", "doctor_name" => "Dr. Emily Williams", "appointment_date" => "2025-06-16T14:00:00"]
];

// Endpoint POST /appointments (membuat janji temu)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/appointments') {
    // Mengambil data pasien dan dokter dari layanan lain
    $input = json_decode(file_get_contents('php://input'), true);
    $patientServiceUrl = 'http://localhost:8001/patients'; // URL Layanan Pasien
    $doctorServiceUrl = 'http://localhost:8002/doctors'; // URL Layanan Dokter

    // Mengambil data pasien dan dokter
    $patients = json_decode(file_get_contents($patientServiceUrl), true);
    $doctors = json_decode(file_get_contents($doctorServiceUrl), true);

    if ($patients === null || $doctors === null) {
        echo json_encode(["status" => "error", "message" => "Failed to retrieve patient or doctor data."]);
        exit;
    }

    // Mencari pasien dan dokter berdasarkan ID
    $patient = array_filter($patients, function ($p) use ($input) {
        return $p['id'] == $input['patient_id'];
    });
    $doctor = array_filter($doctors, function ($d) use ($input) {
        return $d['id'] == $input['doctor_id'];
    });

    if ($patient && $doctor) {
        // Membuat janji temu
        $appointment = [
            "appointment_id" => count($appointments) + 1,
            "patient_name" => reset($patient)['name'],
            "doctor_name" => reset($doctor)['name'],
            "appointment_date" => $input['appointment_date']
        ];
        $appointments[] = $appointment;
        echo json_encode(["status" => "success", "message" => "Appointment created successfully"]);
        exit;
    } else {
        echo json_encode(["status" => "error", "message" => "Patient or Doctor not found"]);
        exit;
    }
}

// Endpoint GET /appointments (mengambil semua janji temu)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/appointments') {
    echo json_encode($appointments);
    exit;
}
?>
