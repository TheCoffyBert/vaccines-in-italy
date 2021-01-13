<?php

    $json = file_get_contents("somministrazioni-vaccini-summary-latest.json");
    $data = json_decode($json,true);

    $data = $data["data"];

    $start_date = $data[0]["data_somministrazione"];
    $start_date = str_replace("T", " ", $start_date);
    $start_date = str_replace(".000Z", "", $start_date);

    $end_date = $data[sizeof($data) - 1]["data_somministrazione"];
    $end_date = str_replace("T", " ", $end_date);
    $end_date = str_replace(".000Z", "", $end_date);

    $dates = array();

    $period = new DatePeriod(
        new DateTime(date("Y-m-d", strtotime($start_date))),
        new DateInterval('P1D'),
        new DateTime(date("Y-m-d", strtotime($end_date . "+1 days")))
    );

    foreach ($period as $key => $value) {
        $dates[] = $value->format('d/m/Y');
    }

    $jsDates = json_encode($dates);

    $abruzzo = array();
    foreach ($dates as $d) {
        $abruzzo[$d] = 0;
    }

    $basilicata = array();
    foreach ($dates as $d) {
        $basilicata[$d] = 0;
    }

    $calabria = array();
    foreach ($dates as $d) {
        $calabria[$d] = 0;
    }

    $campania = array();
    foreach ($dates as $d) {
        $campania[$d] = 0;
    }

    $emiliaromagna = array();
    foreach ($dates as $d) {
        $emiliaromagna[$d] = 0;
    }

    $friuliveneziagiulia = array();
    foreach ($dates as $d) {
        $friuliveneziagiulia[$d] = 0;
    }

    $lazio = array();
    foreach ($dates as $d) {
        $lazio[$d] = 0;
    }

    $liguria = array();
    foreach ($dates as $d) {
        $liguria[$d] = 0;
    }

    $lombardia = array();
    foreach ($dates as $d) {
        $lombardia[$d] = 0;
    }

    $marche = array();
    foreach ($dates as $d) {
        $marche[$d] = 0;
    }

    $molise = array();
    foreach ($dates as $d) {
        $molise[$d] = 0;
    }

    $piemonte = array();
    foreach ($dates as $d) {
        $piemonte[$d] = 0;
    }

    $puglia = array();
    foreach ($dates as $d) {
        $puglia[$d] = 0;
    }

    $sardegna = array();
    foreach ($dates as $d) {
        $sardegna[$d] = 0;
    }

    $sicilia = array();
    foreach ($dates as $d) {
        $sicilia[$d] = 0;
    }

    $toscana = array();
    foreach ($dates as $d) {
        $toscana[$d] = 0;
    }

    $umbria = array();
    foreach ($dates as $d) {
        $umbria[$d] = 0;
    }

    $valledaAosta = array();
    foreach ($dates as $d) {
        $valledaAosta[$d] = 0;
    }

    $veneto = array();
    foreach ($dates as $d) {
        $veneto[$d] = 0;
    }

    $pab = array();
    foreach ($dates as $d) {
        $pab[$d] = 0;
    }

    $pat = array();
    foreach ($dates as $d) {
        $pat[$d] = 0;
    }

    foreach ($data as $d) {

        $data_somministrazione = $d["data_somministrazione"];
        $data_somministrazione = str_replace("T", " ", $data_somministrazione);
        $data_somministrazione = str_replace(".000Z", "", $data_somministrazione);

        $index = date("d/m/Y", strtotime($data_somministrazione));

        switch ($d["area"]){
            case "ABR":
                $abruzzo[$index] = $d["totale"];
                break;
            case "BAS":
                $basilicata[$index] = $d["totale"];
                break;
            case "CAL":
                $calabria[$index] = $d["totale"];
                break;
            case "CAM":
                $campania[$index] = $d["totale"];
                break;
            case "EMR":
                $emiliaromagna[$index] = $d["totale"];
                break;
            case "FVG":
                $friuliveneziagiulia[$index] = $d["totale"];
                break;
            case "LAZ":
                $lazio[$index] = $d["totale"];
                break;
            case "LIG":
                $liguria[$index] = $d["totale"];
                break;
            case "LOM":
                $lombardia[$index] = $d["totale"];
                break;
            case "MAR":
                $marche[$index] = $d["totale"];
                break;
            case "MOL":
                $molise[$index] = $d["totale"];
                break;
            case "PIE":
                $piemonte[$index] = $d["totale"];
                break;
            case "PUG":
                $puglia[$index] = $d["totale"];
                break;
            case "SAR":
                $sardegna[$index] = $d["totale"];
                break;
            case "SIC":
                $sicilia[$index] = $d["totale"];
                break;
            case "TOS":
                $toscana[$index] = $d["totale"];
                break;
            case "UMB":
                $umbria[$index] = $d["totale"];
                break;
            case "VDA":
                $valledaAosta[$index] = $d["totale"];
                break;
            case "VEN":
                $veneto[$index] = $d["totale"];
                break;
            case "PAB":
                $pab[$index] = $d["totale"];
                break;
            case "PAT":
                $pat[$index] = $d["totale"];
                break;
            default:
                break;
        }
    }

    $abruzzoVal = array();
    foreach ($abruzzo as $key => $value) {
        $abruzzoVal[] = $value;
    }

    $basilicataVal = array();
    foreach ($basilicata as $key => $value) {
        $basilicataVal[] = $value;
    }

    $calabriaVal = array();
    foreach ($calabria as $key => $value) {
        $calabriaVal[] = $value;
    }

    $campaniaVal = array();
    foreach ($campania as $key => $value) {
        $campaniaVal[] = $value;
    }

    $emiliaromagnaVal = array();
    foreach ($emiliaromagna as $key => $value) {
        $emiliaromagnaVal[] = $value;
    }

    $friuliveneziagiuliaVal = array();
    foreach ($friuliveneziagiulia as $key => $value) {
        $friuliveneziagiuliaVal[] = $value;
    }

    $lazioVal = array();
    foreach ($lazio as $key => $value) {
        $lazioVal[] = $value;
    }

    $liguriaVal = array();
    foreach ($liguria as $key => $value) {
        $liguriaVal[] = $value;
    }

    $lombardiaVal = array();
    foreach ($lombardia as $key => $value) {
        $lombardiaVal[] = $value;
    }

    $marcheVal = array();
    foreach ($marche as $key => $value) {
        $marcheVal[] = $value;
    }

    $moliseVal = array();
    foreach ($molise as $key => $value) {
        $moliseVal[] = $value;
    }

    $piemonteVal = array();
    foreach ($piemonte as $key => $value) {
        $piemonteVal[] = $value;
    }

    $pugliaVal = array();
    foreach ($puglia as $key => $value) {
        $pugliaVal[] = $value;
    }

    $sardegnaVal = array();
    foreach ($sardegna as $key => $value) {
        $sardegnaVal[] = $value;
    }

    $siciliaVal = array();
    foreach ($sicilia as $key => $value) {
        $siciliaVal[] = $value;
    }

    $toscanaVal = array();
    foreach ($toscana as $key => $value) {
        $toscanaVal[] = $value;
    }

    $umbriaVal = array();
    foreach ($umbria as $key => $value) {
        $umbriaVal[] = $value;
    }

    $valledaAostaVal = array();
    foreach ($valledaAosta as $key => $value) {
        $valledaAostaVal[] = $value;
    }

    $venetoVal = array();
    foreach ($veneto as $key => $value) {
        $venetoVal[] = $value;
    }

    $pabVal = array();
    foreach ($pab as $key => $value) {
        $pabVal[] = $value;
    }

    $patVal = array();
    foreach ($pat as $key => $value) {
        $patVal[] = $value;
    }

    $abruzzo = json_encode($abruzzoVal);
    $basilicata = json_encode($basilicataVal);
    $calabria = json_encode($calabriaVal);
    $campania = json_encode($campaniaVal);
    $emiliaromagna = json_encode($emiliaromagnaVal);
    $friuliveneziagiulia = json_encode($friuliveneziagiuliaVal);
    $lazio = json_encode($lazioVal);
    $liguria = json_encode($liguriaVal);
    $lombardia = json_encode($lombardiaVal);
    $marche = json_encode($marcheVal);
    $molise = json_encode($moliseVal);
    $piemonte = json_encode($piemonteVal);
    $puglia = json_encode($pugliaVal);
    $sardegna = json_encode($sardegnaVal);
    $sicilia = json_encode($siciliaVal);
    $toscana = json_encode($toscanaVal);
    $umbria = json_encode($umbriaVal);
    $valledaAosta = json_encode($valledaAostaVal);
    $veneto = json_encode($venetoVal);
    $pab = json_encode($pabVal);
    $pat = json_encode($patVal);


?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <title>vaccines-in-italy</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper deep-orange lighten-2">
                <a href="#!" class="brand-logo center">Vaccines in Italy</a>
            </div>
        </nav>
    </div>

    <div>
        <div class="container">
            <div class="card-panel center-align">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <div>
        <footer class="page-footer deep-orange lighten-2">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Vaccines in Italy</h5>
                        <p class="grey-text text-lighten-4">A simple (and poorly done) dashboard to check the vaccines' roll-out in Italy</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Disclaimer</h5>
                        <p class="grey-text text-lighten-4">This is a simple website that I made instead of studying for my exams. Even though it's made from official data, I cannot guarantee its fairness.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2021 Paolo Bertinelli
                </div>
            </div>
        </footer>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>

    <script>
        <?php echo "var labelsArray = ". $jsDates .";\n"?>

        <?php echo "var abruzzo = ". $abruzzo .";\n"?>
        <?php echo "var basilicata = ". $basilicata .";\n"?>
        <?php echo "var calabria = ". $calabria .";\n"?>
        <?php echo "var campania = ". $campania .";\n"?>
        <?php echo "var emiliaromagna = ". $emiliaromagna .";\n"?>
        <?php echo "var friuliveneziagiulia = ". $friuliveneziagiulia .";\n"?>
        <?php echo "var lazio = ". $lazio .";\n"?>
        <?php echo "var liguria = ". $liguria .";\n"?>
        <?php echo "var lombardia = ". $lombardia .";\n"?>
        <?php echo "var marche = ". $marche .";\n"?>
        <?php echo "var molise = ". $molise .";\n"?>
        <?php echo "var piemonte = ". $piemonte .";\n"?>
        <?php echo "var puglia = ". $puglia .";\n"?>
        <?php echo "var sardegna = ". $sardegna .";\n"?>
        <?php echo "var sicilia = ". $sicilia .";\n"?>
        <?php echo "var toscana = ". $toscana .";\n"?>
        <?php echo "var umbria = ". $umbria .";\n"?>
        <?php echo "var valledaAosta = ". $valledaAosta .";\n"?>
        <?php echo "var veneto = ". $veneto .";\n"?>
        <?php echo "var pab = ". $pab .";\n"?>
        <?php echo "var pat = ". $pat .";\n"?>

        console.log(abruzzo);

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: labelsArray,
                datasets: [
                    {
                        label: 'Abruzzo',
                        fill: false,
                        borderColor: 'rgb(198, 40, 40)',
                        data: abruzzo
                    },
                    {
                        label: 'Basilicata',
                        fill: false,
                        borderColor: 'rgb(255, 82, 82)',
                        data: basilicata
                    },
                    {
                        label: 'Calabria',
                        fill: false,
                        borderColor: 'rgb(244, 143, 177)',
                        data: calabria
                    },
                    {
                        label: 'Campania',
                        fill: false,
                        borderColor: 'rgb(136, 14, 79)',
                        data: campania
                    },
                    {
                        label: 'Emilia-Romagna',
                        fill: false,
                        borderColor: 'rgb(186, 104, 200)',
                        data: emiliaromagna
                    },
                    {
                        label: 'Friuli-Venezia Giulia',
                        fill: false,
                        borderColor: 'rgb(83, 109, 254)',
                        data: friuliveneziagiulia
                    },
                    {
                        label: 'Lazio',
                        fill: false,
                        borderColor: 'rgb(33, 150, 243)',
                        data: lazio
                    },
                    {
                        label: 'Liguria',
                        fill: false,
                        borderColor: 'rgb(64, 196, 255)',
                        data: liguria
                    },
                    {
                        label: 'Lombardia',
                        fill: false,
                        borderColor: 'rgb(0, 172, 193)',
                        data: lombardia
                    },
                    {
                        label: 'Marche',
                        fill: false,
                        borderColor: 'rgb(29, 233, 182)',
                        data: marche
                    },
                    {
                        label: 'Molise',
                        fill: false,
                        borderColor: 'rgb(0, 230, 118)',
                        data: molise
                    },
                    {
                        label: 'Piemonte',
                        fill: false,
                        borderColor: 'rgb(118, 255, 3)',
                        data: piemonte
                    },
                    {
                        label: 'Puglia',
                        fill: false,
                        borderColor: 'rgb(251, 192, 45)',
                        data: puglia
                    },
                    {
                        label: 'Sardegna',
                        fill: false,
                        borderColor: 'rgb(255, 255, 0)',
                        data: sardegna
                    },
                    {
                        label: 'Sicilia',
                        fill: false,
                        borderColor: 'rgb(239, 108, 0)',
                        data: sicilia
                    },
                    {
                        label: 'Toscana',
                        fill: false,
                        borderColor: 'rgb(84, 110, 122)',
                        data: toscana
                    },
                    {
                        label: 'Umbria',
                        fill: false,
                        borderColor: 'rgb(189, 189, 189)',
                        data: umbria
                    },
                    {
                        label: 'Valle d\'Aosta',
                        fill: false,
                        borderColor: 'rgb(238, 255, 65)',
                        data: valledaAosta
                    },
                    {
                        label: 'Veneto',
                        fill: false,
                        borderColor: 'rgb(1, 87, 155)',
                        data: veneto
                    },
                    {
                        label: 'P.A. Bolzano',
                        fill: false,
                        borderColor: 'rgb(197, 17, 98)',
                        data: pab
                    },
                    {
                        label: 'P.A. Trento',
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        data: pat
                    }
                ]
            },

            // Configuration options go here
            options: {
                responsive: true,
                legend: {
                    position: 'left',
                }
            }
        });
    </script>

</body>
</html>