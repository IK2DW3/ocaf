<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Ambito;
use App\Continente;
use App\Pregunta;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private $arrayContinentes = array(
		array(
			'esp' => 'Norte América', 
			'eng' => 'North America', 
			'eus' => 'Ipar America'
        ),
        array(
			'esp' => 'Sud América', 
			'eng' => 'South America', 
			'eus' => 'Hego America'
        ),
        array(
			'esp' => 'Europa', 
			'eng' => 'Europe', 
			'eus' => 'Europa'
        ),
        array(
			'esp' => 'África', 
			'eng' => 'Africa', 
			'eus' => 'Africa'
        ),
        array(
			'esp' => 'Ásia', 
			'eng' => 'Asia', 
			'eus' => 'Asia'
        ),
        array(
			'esp' => 'Oceanía', 
			'eng' => 'Oceania', 
			'eus' => 'Oceania'
        ),
        array(
			'esp' => 'Antartida', 
			'eng' => 'Antartida', 
			'eus' => 'Antarctica'
        ),
        array(
			'esp' => 'Doble nacionalidad', 
			'eng' => 'Double nationality', 
			'eus' => 'Nazionalitate bikoitza'
		)
    );

    private $arrayAmbitos = array(
		array(
			'esp' => 'Historia', 
			'eng' => 'History', 
			'eus' => 'Historia'
        ),
        array(
			'esp' => 'Derecho', 
			'eng' => 'Laws', 
			'eus' => 'Zuzenbidea'
        ),
        array(
			'esp' => 'Antropología', 
			'eng' => 'Anthropology', 
			'eus' => 'Antropologia'
        ),
        array(
			'esp' => 'Geografía', 
			'eng' => 'Geography', 
			'eus' => 'Geografia'
        ),
        array(
			'esp' => 'Filosofía', 
			'eng' => 'Philosophy', 
			'eus' => 'Filosofia'
        ),
        array(
			'esp' => 'Psicología', 
			'eng' => 'Psychology', 
			'eus' => 'Psicologia'
        ),
        array(
			'esp' => 'Economía', 
			'eng' => 'Economy', 
			'eus' => 'Economia'
        ),
        array(
			'esp' => 'Sociología', 
			'eng' => 'Sociology', 
			'eus' => 'Sociologia'
        ),
        array(
			'esp' => 'Pedagogía', 
			'eng' => 'Pedagogy', 
			'eus' => 'Pedagogia'
        )
    );

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
        self::seedAmbitos();
        self::seedContinentes();
        self::seedCartas();
        //self::seedPreguntas();
		
        $this->command->info('Datos insertados correctamente!');

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

    public function seedAmbitos()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('ambitos')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayAmbitos as $ambito ) {
            $p = new Ambito;
            $p->nombreEsp = $ambito['esp'];
            $p->nombreEng = $ambito['eng'];
            $p->nombreEus = $ambito['eus'];
            $p->save();
        }

    }

    public function seedContinentes()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('continentes')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayContinentes as $continente ) {
            $p = new Continente;
            $p->nombreEsp = $continente['esp'];
            $p->nombreEng = $continente['eng'];
            $p->nombreEus = $continente['eus'];
            $p->save();
        }

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
