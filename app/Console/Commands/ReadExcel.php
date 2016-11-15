<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReadExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excelread {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parses excel file and write data to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("Reading " . $this->argument('file'));
        $objPHPExcel = \PHPExcel_IOFactory::load( $this->argument('file'));
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    echo "<br>The worksheet ".$worksheetTitle." has ";
    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    echo ' and ' . $highestRow . ' row.';
    echo '<br>Data: <table border="1"><tr>';
    for ($row = 1; $row <= $highestRow; ++ $row) {
        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = \PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
    }
}
