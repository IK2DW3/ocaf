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
        ),
        array(
			'esp' => 'N/A',
			'eng' => 'NONE',
			'eus' => 'N/A'
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

    // Funcion de inicio del seeder
    public function run()
    {
        // Añadimos los seeders
        self::seedUsers();
        self::seedAmbitos();
        self::seedContinentes();

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
        $user->tipo = 'superadmin';
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
            $p->ambitoEsp = $ambito['esp'];
            $p->ambitoEng = $ambito['eng'];
            $p->ambitoEus = $ambito['eus'];
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
            $p->continenteEsp = $continente['esp'];
            $p->continenteEng = $continente['eng'];
            $p->continenteEus = $continente['eus'];
            $p->save();
        }

    }


}
