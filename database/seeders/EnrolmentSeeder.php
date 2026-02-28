<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Student, Classroom, Enrolment};

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $ligeiro_morning_06h40_07h50 = Classroom::where(ClassroomSeeder::LIGEIRO_MORNING_08H00_09H30)->first();
       $ana = $this->student(StudentSeeder::ANA);
       $data = ['classroom_id' => $ligeiro_morning_06h40_07h50->id, 'student_id' => $ana->id];
       $enrolment1 = Enrolment::updateOrCreate($data, $data);

       $ligeiro_morning_08h00_09h30 = Classroom::where(ClassroomSeeder::LIGEIRO_MORNING_08H00_09H30)->first();
       $paula = $this->student(StudentSeeder::PAULA);
       $data = ['classroom_id' => $ligeiro_morning_08h00_09h30->id, 'student_id' => $paula->id];
       $enrolment2 =  Enrolment::updateOrCreate($data, $data);

       $ligeiro_morning_08h00_09h30 = Classroom::where(ClassroomSeeder::LIGEIRO_MORNING_08H00_09H30)->first();
       $miguel = $this->student(StudentSeeder::MIGUEL);
       $data = ['classroom_id' => $ligeiro_morning_08h00_09h30->id, 'student_id' => $miguel->id];
       $enrolment3 =  Enrolment::updateOrCreate($data, $data);
    }

    public function student($data){
        return Student::join('users', 'user_id', 'users.id')
                ->where($data)
                ->select('students.*')
                ->first();
    }
}
