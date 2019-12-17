<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pregunta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private $arrayPreguntas = array(
		array(
			'pregunta' => '¿algo?', 
			'respuesta_1' => 'algo', 
			'respuesta_2' => 'algo', 
            'respuesta_3' => 'algo',
            'cartaid' => '1'
		)
    );

    // Funcion de inicio del seeder
    public function run()
    {
        // Añadimos los seeders
        self::seedUsers();
        self::seedCartas();
        self::seedPreguntas();
		
        $this->command->info('Tabla cartas y usuarios inicializada con datos!');

    }

    public function seedUsers()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('users')->delete();

        // Rellenamos la tabla con el nuevo contenido
		$user = new User;
		$user->name = 'Administrador';
        $user->email = 'adminsupport@rdjsl.com';
        $user->email = 'superadmin';
		$user->password = bcrypt('adminrootg1');
		$user->save();

    }

    public function seedCartas()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('cartas')->delete();

    }
    
    public function seedPreguntas()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('preguntas')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayPreguntas as $pregunta ) {
            $p = new Pregunta;
            $p->pregunta = $pregunta['pregunta'];
            $p->respuesta_1 = $pregunta['respuesta_1'];
            $p->respuesta_2 = $pregunta['respuesta_2'];
            $p->respuesta_3 = $pregunta['respuesta_3'];
            $p->cartaid = $pregunta['cartaid'];
            $p->save();
        }

	}
	
	
}
