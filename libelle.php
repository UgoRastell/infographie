<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://kit.fontawesome.com/e26fbc0d8d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include "./php/navbar.php" ?>
    <div class="container">
        <div class="cercle">
            <div class="dot">
                <p>+ DE 30 ESPECE</p>
            </div>
            <div class="dot">
                <p>+ DE 30 ESPECE</p>
            </div>
        </div>
        
        <div class="cercle2">
            <div class="dot">
                <p>+ DE 30 ESPECE</p>
            </div>
            <div class="dot">
                <p>+ DE 30 ESPECE</p>
            </div>
        </div>
        
        <div id="graph1">
            <canvas id="myChart" width="400px" height="400px"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    
    $db = new mysqli ('localhost', 'root', '', 'bdd_arbre');
    $querylist = array("Hêtre", "Arbre aux quarante écus", "Chêne", "Chicot du Canada", "Platane", "Sophora", "Savonnier", "Tulipier", "Cèdre", "Cedrele", "Orme de Sibérie", "Magnolia", "Libocèdre", "Sterculier", "Pterocarya", "Plaqueminier", "Pin", "If", "Figuier", "Grenadier", "Erable", "Pistachier", "Saule", "Catalpa", "Tilleul", "Amandier", "Sequoia", "Noyer", "Marronnier", "Lilas de Perse", "Orme", "Noisetier de Byzance", "Bouleau", "Robinier", "Arbre à Gutta-Percha", "Mûrier", "Tamaris", "Metaséquoia", "Cyprès Chauve", "Paulownia", "Aulne", "Micocoulier", "Arbre aux mouchoirs", "Oranger des Osages" , "Cryptomeria");
    
    foreach($querylist as $libelle) {
        $result = $query = $db->query("SELECT COUNT(`Libellefrancais`) as LIBELLEFRANCAIS FROM arbresremarquables WHERE `Libellefrancais` = '".$libelle."' ");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $libellefr = $r['LIBELLEFRANCAIS'];
        $nb[] = $libellefr;
    }
    ?>
    <script>
    const data = {
        labels: ["Hêtre", "Arbre aux quarante écus", "Chêne", "Chicot du Canada", "Platane", "Sophora", "Savonnier", "Tulipier", "Cèdre", "Cedrele", "Orme de Sibérie", "Magnolia", "Libocèdre", "Sterculier", "Pterocarya", "Plaqueminier", "Pin", "If", "Figuier", "Grenadier", "Erable", "Pistachier", "Saule", "Catalpa", "Tilleul", "Amandier", "Sequoia", "Noyer", "Marronnier", "Lilas de Perse", "Orme", "Noisetier de Byzance", "Bouleau", "Robinier", "Arbre à Gutta-Percha", "Mûrier", "Tamaris", "Metaséquoia", "Cyprès Chauve", "Paulownia", "Aulne", "Micocoulier", "Arbre aux mouchoirs", "Oranger des Osages" , "Cryptomeria"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb)?>,
        backgroundColor: [
            'rgba(63, 66, 56)',
            'rgba(107, 112, 92)',
            'rgba(165, 165, 141)',
            'rgba(183, 183, 164)',
            'rgba(212, 199, 176)',
            'rgba(255, 232, 214)',
            'rgba(221, 190, 169)',
            'rgba(203, 153, 126)'
        ],
        borderColor: [
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)'],
        hoverOffset: 2
        }]
    };
    
    const config = {
        type: 'doughnut',
        data: data,
        options: {
            plugins:{
                    legend:{ 
                        display: false,}}}
    };

    const MyChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    
</script>
    
</body>
</html>