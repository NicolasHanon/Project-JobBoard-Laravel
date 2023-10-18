<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTable()
    {
        $tables = ['applications', 'companies', 'jobs', 'migrations', 'roles', 'users'];
        $columnNames = $this->getColumnNames($tables[0]);

        $tableData = [
            'tablesnames' => $tables,
            'name' => $tables[0],
            'columns' => $columnNames,
            'data' => DB::table($tables[0])->get(),
        ];
        return response()->json($tableData);
    }

    public function getColumnNames($tableName)
    {
        $columnNames = Schema::getColumnListing($tableName);
        return $columnNames;
    }

    public function showTableData($tableName)
    {
        $columnNames = Schema::getColumnListing($tableName);
        $tableData = [
            'name' => $tableName,
            'columns' => $columnNames,
            'data' => DB::table($tableName)->get(),
        ];
        return response()->json($tableData);
    }
    
    public function deleteRow($id, $table)
    {
        $data = DB::table($table)
        ->where($table.'.id', '=', $id)
        ->delete();
        return response()->json($data);
    }

    public function addRow($jsonData, $table)
    {
        $data = json_decode($jsonData, true);
        $columnNames = Schema::getColumnListing($table);
        $insertData = [];

        for ($i = 0; $i < count($columnNames); $i++) {
            $insertData[$columnNames[$i]] = $data[$i];
        }
        DB::table($table)->insert($insertData);
    }
}
