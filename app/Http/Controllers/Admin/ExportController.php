<?php

namespace guiaceliaca\Http\Controllers\Admin;

use guiaceliaca\NewsLetter;
use guiaceliaca\User;
use guiaceliaca\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportAllUsers()
    {
        $users = User::all();

        foreach ($users as $user) {

            $userData[] = [
                'Name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'type' => $user->type,
                'lastLogin' => $user->lastLogin,
            ];
        }

        // Generate and return the spreadsheet
        Excel::create('todos los usuarios', function ($excel) use ($userData, $users) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('usuarios', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });

        })->download('xls');
    }

    public function exportNewsLetterUsers()
    {
        $users = NewsLetter::all();

        foreach ($users as $user) {

            $userData[] = [
                'email' => $user->email,
            ];
        }

        // Generate and return the spreadsheet
        Excel::create('newsletter usuarios', function ($excel) use ($userData) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('sheet1', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });

        })->download('xls');
    }

    public function exportClientUsers()
    {
        $users = User::where('type', 'CLIENT')
            ->get();

        foreach ($users as $user) {

            $userData[] = [
                'Name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'lastLogin' => $user->lastLogin,
            ];
        }

        // Generate and return the spreadsheet
        Excel::create('usuarios clientes', function ($excel) use ($userData) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('sheet1', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });

        })->download('xls');
    }

    public function exportOwnerUsers()
    {
        $users = User::where('type', 'OWNER')
            ->get();

        foreach ($users as $user) {

            $userData[] = [
                'Name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'lastLogin' => $user->lastLogin,
            ];
        }

        // Generate and return the spreadsheet
        Excel::create('usuarios owner', function ($excel) use ($userData) {

            // Build the spreadsheet, passing in the users array
            $excel->sheet('sheet1', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });

        })->download('xls');
    }
}
