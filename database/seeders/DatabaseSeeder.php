<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuracion;
use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/* use Spatie\Permission\Contracts\Permission; */
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class,]); 

        //admin
        User::create ([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('admin');


        //secretaria
        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellido' => '1',
            'dni' => '11111111',
            'celular' => '1111111111',
            'fecha_nacimiento' => '10/10/1993',
            'direccion' => 'Sallent 952',
            'user_id' => '2'
        ]);


        //doctor1
        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellido' => 'Swift',
            'celular' => '432223',
            'licencia_medica' => '23343',
            'especialidad' => 'PEDIATRÍA',
            'user_id' => '3'
        ]);


        //doctor2
        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor2',
            'apellido' => 'Barrientos',
            'celular' => '4324433',
            'licencia_medica' => '434555',
            'especialidad' => 'ODONTOLOGÍA',
            'user_id' => '4'
        ]);


        //doctor3
        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'Doctor3',
            'apellido' => 'Valdez',
            'celular' => '4323343',
            'licencia_medica' => '434566',
            'especialidad' => 'FISIOTERAPIA',
            'user_id' => '5'
        ]);

        //consultorio1
        Consultorio::create([
            'nombre' => 'PEDIATRÍA',
            'ubicacion' => '1-1A',
            'capacidad' => '10',
            'telefono' => '',
            'especialidad' => 'PEDIATRÍA',
            'estado' => 'ACTIVO',
        ]);

        //consultorio2 
        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => '3-1A',
            'capacidad' => '20',
            'telefono' => '388844556621',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'ACTIVO',
        ]);

        //consultorio3
        Consultorio::create([
            'nombre' => 'ODONTOLOGÍA',
            'ubicacion' => '2-1A',
            'capacidad' => '5',
            'telefono' => '3888652211',
            'especialidad' => 'ODONTOLOGÍA',
            'estado' => 'ACTIVO',
        ]);


        //pacientes
        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('paciente');


        //usuario
        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make( value: '12345678' ),
        ])->assignRole('usuario');
        
        $this->call([PacienteSeeder::class,]);


        //creación de horarios
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1',
        ]);

        //creación de una configuración predeterminada
        Configuracion::create([
            'nombre'=>'Hospital Páterson',
            'direccion'=>'Av. Siria 123',
            'telefono'=>'3888 452055',
            'correo'=>'paterson@gmail.com',
            'logo'=>'logos/c1ECMK1AMVYYrTGOL4MCFCTnGFf0DyZsvmHkt5uN.png'
        ]);
    }
}
