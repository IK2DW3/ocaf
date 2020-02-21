<?php

use Illuminate\Database\Seeder;
use App\Rango;
use App\User;
use App\Ambito;
use App\Continente;
use App\Pregunta;
use App\Categoria;
use App\Post;

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

    private $arrayRangos = array(
		array(
            'nombre' => 'Superadmin',
            'descripcion' => 'Usuario con permisos totales sobre toda la aplicacion'
        ),
        array(
            'nombre' => 'Administrador',
            'descripcion' => 'Usuario con permisos avanzados  en la aplicacion'
        ),
        array(
            'nombre' => 'Moderador',
            'descripcion' => 'Usuario con permisos basicos en la aplicacion'
        ),
        array(
            'nombre' => 'Usuario',
            'descripcion' => 'Usuario con permisos minimos de uso en la aplicacion'
        ),
    );

    private $arrayCategorias = array(
		array(
            'nombre' => 'Off-Topic',
            'descripcion' => 'Categoria con posts de tema general'
        )
    );

    private $arrayPosts = array(
		array(
            'titulo' => 'Bienvenida',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        ),
        array(
            'titulo' => 'Una entrada normal',
            'descripcion' => 'Éste es nuestro blog con el cual queremos compartir nuestras experiencias y conocimientos',
            'imagen' => '',
            'numero_comentarios' => 0,
            'categoria_id' => 1,
            'user_id' => 1
        )
    );

    // Funcion de inicio del seeder
    public function run()
    {
        // Añadimos los seeders
        self::seedRangos();
        self::seedUsers();
        self::seedAmbitos();
        self::seedContinentes();
        self::seedCategorias();
        self::seedPosts();

        $this->command->info('Datos insertados correctamente!');

    }

    public function seedRangos()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('rangos')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayRangos as $rango ) {
            $range = new Rango;
            $range->nombre = $rango['nombre'];
            $range->descripcion = $rango['descripcion'];
            $range->save();
        }

    }

    public function seedUsers()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('users')->delete();

        // Rellenamos la tabla con el nuevo contenido
		$user = new User;
		$user->name = 'Administrador';
        $user->email = 'ocafsupport@gmail.com';
        $user->rango_id = 1;
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

    public function seedCategorias()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('categorias')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayCategorias as $categoria ) {
            $p = new Categoria;
            $p->nombre = $categoria['nombre'];
            $p->descripcion = $categoria['descripcion'];
            $p->save();
        }

    }

    public function seedPosts()
    {
        // En primer lugar borramos el contenido de la tabla
        DB::table('posts')->delete();

        // Rellenamos la tabla con el nuevo contenido
        foreach( $this->arrayPosts as $post ) {
            $p = new Post;
            $p->titulo = $post['titulo'];
            $p->descripcion = $post['descripcion'];
            $p->imagen = $post['imagen'];
            $p->numero_comentarios = $post['numero_comentarios'];
            $p->categoria_id = $post['categoria_id'];
            $p->user_id = $post['user_id'];
            $p->save();
        }

    }


}
