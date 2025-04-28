<?php
$file = 'data.json';

$data = json_decode(file_get_contents('php://input'), true);
$existing = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$existing[] = $data;

file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));
echo json_encode(['status' => 'success']);
