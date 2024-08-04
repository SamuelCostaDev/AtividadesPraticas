<?php

require_once '../src/RomanNumeralConverter.php';

use NumeralConverter\RomanNumeralConverter;

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$number = $data['number'] ?? null;

if (!$number) {
    echo json_encode(['error' => 'Nenhum número foi fornecido.']);
    exit;
}

$converter = new RomanNumeralConverter();

if (is_numeric($number)) {
    $result = $converter->convertToRoman((int)$number);
} else {
    try {
        $result = $converter->convertFromRoman(strtoupper($number));
    } catch (Exception $e) {
        $result = 'Número romano inválido.';
    }
}

// Retornar apenas a string do resultado, sem tags HTML
echo json_encode(['result' => $result]);
