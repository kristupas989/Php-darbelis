<html lang="en">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
<head>
    <style>
        article{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            font-family: 'Source Sans Pro', sans-serif;
            line-height: 3;
        }
        div{
            border: black 2px solid;
            text-align: center;
            padding: 5px;
            display: grid;
            place-items: center;
            line-height: 3;
        }
        article:nth-child(odd){
            background-color:#99ccff;
        }
        ul{
            text-align: left;
        }
    </style>
</head>
<body>
    <article>
        <div><strong>Klasė</strong></div>
        <div><strong>Kodas</strong></div>
        <div><strong>Vardas</strong></div>
        <div><strong>Pavardė</strong></div>
        <div><strong>Kontrolinių darbų vidurkis</strong></div>
        <div><strong>Duomenų formavimo data</strong></div>
    </article>
   
    <?php
    //
    class utils
    {
        function output_array($arr){
            for($i = 0; $i < 6; $i++)
                echo "<div>".$arr[$i]."</div>";
        }
        function return_list($arr){
            $output = "<ul>";
            foreach ($arr as $key => $value) {
                $output = $output."<li>".$key.": ".$value."</li>";
            }
            $output = $output."</ul>";
            return $output;
        }
        function format_text($text){
            $text = strtolower($text);
            $text[0] = strtoupper($text[0]);
            return $text;
        }
    }
   
    class klase extends utils{
        private $pavadinimas;
        private $mokiniai = [];

        function  __construct($pavadinimas){
            $this->pavadinimas = $pavadinimas;
        }

        function prideti_mokini($vardas, $pavarde){
            array_push($this->mokiniai,
                array(
                    "vardas" => $this->format_text($vardas),
                    "pavarde" => $this->format_text($pavarde),
                    "vidurkiai" => array(
                        "Matematika" =>  rand(5,10),
                        "Informacinės technologijo" => rand(5,10),
                        "Anglų kalba" => rand(5,10)
                    ),
                    "kodas" => rand(10000,99999),
                    "data" => date("Y/m/d - H:i:s")
                )
            );
        }

        function print_mokiniai(){
            for ($i=0; $i < count($this->mokiniai); $i++) {
                echo "<article>";
                $this->output_array(
                    [$this->pavadinimas,
                    $this->mokiniai[$i]["kodas"],
                    $this->mokiniai[$i]["vardas"],
                    $this->mokiniai[$i]["pavarde"],
                    $this->return_list($this->mokiniai[$i]["vidurkiai"]),
                    $this->mokiniai[$i]["data"]
                    ]);
                echo "</article>";
            }
        }
    }
    //
    $kt = new klase("KT 20/1");
    $kt->prideti_mokini("Azuolas", "Kimanskis");
    $kt->prideti_mokini("Gytis", "juska");
    $kt->prideti_mokini("Vidmantas", "kulinas");
    $kt->prideti_mokini("Vladimer", "putin");
    $kt->prideti_mokini("Bosvaldas", "ogivikas");
    $kt->prideti_mokini("Matukas", "Nori zetuko");
    $kt->prideti_mokini("Rajono", "Kunigas");
    $kt->prideti_mokini("Haris", "Iš Zip fm");
    $kt->prideti_mokini("Paulius", "Iš M-1");
    $kt->prideti_mokini("Aurimas", "iš Ubr team");
    $kt->print_mokiniai();
    ?>
</body>
</html>
