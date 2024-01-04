<?php

namespace App\Traits;

trait Utilities{
    private function all_csv_export(array $export_array, array $head, string $filename = '', $delimiter = ";", $to_download = true) {
        if($to_download) {
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            $f = fopen('php://output', 'w');
        } else {
            $f = fopen('php://memory', 'w');
        }
        fputcsv($f, $head, $delimiter);
        foreach ($export_array as $line) {
            fputcsv($f, $line, $delimiter);
        }
        if (!$to_download) {
            fseek($f, 0);
            $csvData = stream_get_contents($f);
            fclose($f);
            $directory = 'public/uploads/staff_joining_letter/';
            // Save CSV data to a file
            $filePath = $directory . $filename;
            file_put_contents($filePath, $csvData);
            return $filePath;
        }
        fclose($f);
    }
}