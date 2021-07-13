<?php


class CsvExporter
{
    public static function export(array $items, string $fileName)
    {
        $csvHandle = fopen($fileName, 'w');

        foreach ($items as $record) {
            $data = $record->toArray(false);
            fputcsv($csvHandle, $data);
        }

        fclose($csvHandle);
    }
}
