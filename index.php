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
    $basilicata = array();
    $calabria = array();
    $campania = array();
    $emiliaromagna = array();
    $friuliveneziagiulia = array();
    $lazio = array();
    $liguria = array();
    $lombardia = array();
    $marche = array();
    $molise = array();
    $piemonte = array();
    $puglia = array();
    $sardegna = array();
    $sicilia = array();
    $toscana = array();
    $umbria = array();
    $valledaAosta = array();
    $veneto = array();
    $pab = array();
    $pat = array();

    foreach ($data as $d) {
        switch ($d["area"]){
            case "ABR":
                $abruzzo[] = $d["totale"];
                break;
            case "BAS":
                $basilicata[] = $d["totale"];
                break;
            case "CAL":
                $calabria[] = $d["totale"];
                break;
            case "CAM":
                $campania[] = $d["totale"];
                break;
            case "EMR":
                $emiliaromagna[] = $d["totale"];
                break;
            case "FVG":
                $friuliveneziagiulia[] = $d["totale"];
                break;
            case "LAZ":
                $lazio[] = $d["totale"];
                break;
            case "LIG":
                $liguria[] = $d["totale"];
                break;
            case "LOM":
                $lombardia[] = $d["totale"];
                break;
            case "MAR":
                $marche[] = $d["totale"];
                break;
            case "MOL":
                $molise[] = $d["totale"];
                break;
            case "PIE":
                $piemonte[] = $d["totale"];
                break;
            case "PUG":
                $puglia[] = $d["totale"];
                break;
            case "SAR":
                $sardegna[] = $d["totale"];
                break;
            case "SIC":
                $sicilia[] = $d["totale"];
                break;
            case "TOS":
                $toscana[] = $d["totale"];
                break;
            case "UMB":
                $umbria[] = $d["totale"];
                break;
            case "VDA":
                $valledaAosta[] = $d["totale"];
                break;
            case "VEN":
                $veneto[] = $d["totale"];
                break;
            case "PAB":
                $pab[] = $d["totale"];
                break;
            case "PAT":
                $pat[] = $d["totale"];
                break;
            default:
                break;
        }
    }

    $abruzzo = json_encode($abruzzo);
    $basilicata = json_encode($basilicata);
    $calabria = json_encode($calabria);
    $campania = json_encode($campania);
    $emiliaromagna = json_encode($emiliaromagna);
    $friuliveneziagiulia = json_encode($friuliveneziagiulia);
    $lazio = json_encode($lazio);
    $liguria = json_encode($liguria);
    $lombardia = json_encode($lombardia);
    $marche = json_encode($marche);
    $molise = json_encode($molise);
    $piemonte = json_encode($piemonte);
    $puglia = json_encode($puglia);
    $sardegna = json_encode($sardegna);
    $sicilia = json_encode($sicilia);
    $toscana = json_encode($toscana);
    $umbria = json_encode($umbria);
    $valledaAosta = json_encode($valledaAosta);
    $veneto = json_encode($veneto);
    $pab = json_encode($pab);
    $pat = json_encode($pat);


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
                        <p class="grey-text text-lighten-4">A simple (and poorly done) dashboard for checking the vaccines roll-out in Italy</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Disclaimer</h5>
                        <p class="grey-text text-lighten-4">Lorem ipsum...</p>
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

        console.log(labelsArray);

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
                        label: 'Provincia Autonoma di Bolzano',
                        fill: false,
                        borderColor: 'rgb(197, 17, 98)',
                        data: pab
                    },
                    {
                        label: 'Provincia Autonoma di Trento',
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        data: pat
                    }
                ]
            },

            // Configuration options go here
            options: {}
        });
    </script>

</body>
</html>