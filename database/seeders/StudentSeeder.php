<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['2023-0142', 'Rhea Mae Cabanilla', 'BSIT', 'rheamae.cabanilla07@gmail.com'],
            ['2023-0143', 'Jericho Valdez Dumlao Jr.', 'BSED', 'jerichod_2915@yahoo.com'],
            ['2023-0144', 'Camille Ann Soriano-Bugarin', 'BSBA', 'camsoriano.0331@gmail.com'],
            ['2023-0145', 'Nathaniel Quiambao Pascua', 'BSIT', 'nate.pascua88@outlook.com'],
            ['2023-0146', 'Trisha Lovely Dela Peña Manuel', 'BSHM', 'trishalovely.m1204@gmail.com'],
            ['2023-0147', 'Dexter Ibarra', 'BSIT', 'dexibarra_46@gmail.com'],
            ['2023-0148', 'Mikaela Joy Tolentino Sison', 'BSA', 'kaelajoy.tol2210@yahoo.com'],
            ['2023-0149', 'Renz Adriel Alcantara Jr.', 'BSCrim', 'renzalcantara.5503@gmail.com'],
            ['2023-0150', 'Shaina Mae Padilla', 'BEED', 'shainapadilla19@outlook.com'],
            ['2023-0151', 'Lorenzo Gabriel Gatchalian', 'BSTM', 'enzo.gatchalian_0724@gmail.com'],
            ['2023-0152', 'Bianca Louise Fernandez Ocampo', 'BSN', 'bianca.ocampo_1108@gmail.com'],
            ['2023-0153', 'Elmer Santiago Rosales Jr.', 'BSED', 'elmerrosales.6642@yahoo.com'],
            ['2023-0154', 'Kyla Marie Dizon-Agbayani', 'BSA', 'kylamarie.dizon0917@outlook.com'],
            ['2023-0155', 'Vincent Paolo Salazar III', 'BSBA', 'vinpaolo.salazar_2306@gmail.com'],
        ];

        foreach ($students as [$no, $name, $course, $email]) {
            Student::create([
                'student_no' => $no,
                'fullname' => $name,
                'course' => $course,
                'email' => $email,
            ]);
        }
    }
}