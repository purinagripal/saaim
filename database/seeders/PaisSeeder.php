<?php

namespace Database\Seeders;

use App\Models\Continente;
use Illuminate\Database\Seeder;
use App\Models\Pais;


class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $europa = array(
            "Albania",
            "Alemania",
            "Andorra",
            "Armenia",
            "Austria",
            "Azerbaiyán",
            "Bélgica",
            "Bielorrusia",
            "Bosnia y Herzegovina",
            "Bulgaria",
            "Chipre",
            "Ciudad del Vaticano",
            "Croacia",
            "Dinamarca",
            "Eslovaquia",
            "Eslovenia",
            "España",
            "Estonia",
            "Finlandia",
            "Francia",
            "Georgia",
            "Grecia",
            "Hungría",
            "Irlanda",
            "Islandia",
            "Italia",
            "Kosovo",
            "Letonia",
            "Liechtenstein",
            "Lituania",
            "Luxemburgo",
            "Macedonia, República de",
            "Malta",
            "Moldavia",
            "Mónaco",
            "Montenegro",
            "Noruega",
            "Países Bajos",
            "Polonia", 
            "Portugal",
            "Reino Unido",
            "República Checa",
            "Rumanía", 
            "Rusia",
            "San Marino",
            "Suecia", 
            "Suiza",
            "Turquía",
            "Ucrania",
            "Yugoslavia"
        );

        foreach ($europa as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 1
            ]);
        }

        $africa = array(
            "Angola",
            "Argelia",
            "Benín",
            "Botswana",
            "Burkina Faso",
            "Burundi",
            "Camerún",
            "Cabo Verde",
            "Chad",
            "Comores",
            "Congo",
            "Congo, República Democrática del",
            "Costa de Marfil",
            "Egipto",
            "Eritrea",
            "Etiopía",
            "Gabón",
            "Gambia",
            "Ghana",
            "Guinea",
            "Guinea Bissau",
            "Guinea Ecuatorial",
            "Kenia",
            "Lesoto",
            "Liberia",
            "Libia",
            "Madagascar",
            "Malawi",
            "Malí",
            "Marruecos",
            "Mauricio",
            "Mauritania",
            "Mozambique",
            "Namibia",
            "Níger",  
            "Nigeria",
            "República Centroafricana",
            "República de Sudáfrica",
            "Ruanda",
            "Sahara Occidental",
            "Santo Tomé y Príncipe",
            "Senegal",  
            "Seychelles", 
            "Sierra Leona",
            "Somalia",
            "Sudán",
            "Sudán del Sur",
            "Suazilandia",
            "Tanzania",
            "Togo",
            "Túnez",
            "Uganda",
            "Yibuti",
            "Zambia",  
            "Zimbabue",
        );
          

        foreach ($africa as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 2
            ]);
        }

        $oceania = array(
            "Australia",
            "Micronesia, Estados Federados de",
            "Fiji",
            "Kiribati",
            "Islas Marshall",
            "Islas Salomón",
            "Nauru",
            "Nueva Zelanda",
            "Palaos",
            "Papúa Nueva Guinea",
            "Samoa",
            "Tonga",
            "Tuvalu", 
            "Vanuatu", 
        );

        foreach ($oceania as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 3
            ]);
        }

        $sudamerica = array(
            "Argentina",
            "Bolivia",
            "Brasil",
            "Chile",
            "Colombia",
            "Ecuador",
            "Guayana",
            "Paraguay",
            "Perú",
            "Surinam",
            "Trinidad y Tobago",
            "Uruguay",
            "Venezuela",
        );

        foreach ($sudamerica as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 4
            ]);
        }

        $norteamerica = array(
            "Antigua y Barbuda",
            "Bahamas",
            "Barbados",
            "Belice",
            "Canadá",
            "Costa Rica",
            "Cuba",
            "Dominica",
            "El Salvador",
            "Estados Unidos",
            "Granada",
            "Guatemala",
            "Haití",
            "Honduras",
            "Jamaica",
            "México",
            "Nicaragua",
            "Panamá",
            "Puerto Rico",
            "República Dominicana",
            "San Cristóbal y Nieves",
            "San Vicente y Granadinas",
            "Santa Lucía",
        );          

        foreach ($norteamerica as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 5
            ]);
        }

        $asia = array(
            "Afganistán",
            "Arabia Saudí",
            "Baréin",
            "Bangladesh",
            "Birmania",
            "Bután",
            "Brunéi",
            "Camboya",
            "China",
            "Corea, República Popular Democrática de",
            "Corea, República de",
            "Emiratos Árabes Unidos",
            "Filipinas",
            "India",
            "Indonesia",
            "Iraq", 
            "Irán",
            "Israel",
            "Japón",
            "Jordania",
            "Kazajistán",
            "Kirguizistán",
            "Kuwait",
            "Laos",
            "Líbano",
            "Malasia",
            "Maldivas",
            "Mongolia",
            "Nepal",
            "Omán",
            "Paquistán",
            "Qatar",
            "Singapur",
            "Siria",
            "Sri Lanka",
            "Tayikistán",
            "Tailandia",
            "Timor Oriental",
            "Turkmenistán",
            "Uzbekistán",
            "Vietnam",
            "Yemen",
        );

        foreach ($asia as $pais){
            Pais::create([
                'nombre' => $pais,
                'continente_id' => 6
            ]);
        }

    }
}
