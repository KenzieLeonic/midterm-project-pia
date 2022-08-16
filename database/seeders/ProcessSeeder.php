<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $process = Process::first();
        if (!$process) {
            $this->command->line("Generating process status");
            $processes = ['รออนุมัติ', 'อนุมัติ', 'รอดำเนินการ', 'เสร็จสิ้น'];
            collect($processes)->each(function ($process_name, $key) {
                $process = new Process;
                $process->name = $process_name;
                $process->save();
            });
        }

    }
}
