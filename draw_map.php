<?php
$map = new \classes\Map();
$map_arr = $map->mapGenerator(50,50, 9, 40, 80);

$cellSizeW = 12;
$cellSizeH = 12;
//$map->drawMap();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Isometric Map</title>
    <style>
        body {

            transform-style: preserve-3d;
            perspective: 350px;
            background-color: #333;
        }

        #map {
            width: <?php echo $map->getWidth()*$cellSizeW; ?>px;
            height: <?php echo $map->getHeigth()*$cellSizeH ?>px;
            position: relative;
            left: 30%;
            /*        transform: rotateX(30deg) rotateZ(10deg) translateZ(-100px);

             */
            transform: translateZ(-200px) rotateX(60deg) rotateZ(270deg);
            background-color: #333;
            animation: rotate 55s infinite;
            transform-style: preserve-3d;
            transform-origin: center center;
        }
        @keyframes rotate {
            0% { transform: translateZ(-200px) rotateX(60deg) rotateZ(0deg); }
            100% { transform: translateZ(-200px) rotateX(60deg) rotateZ(360deg); }
        }


        .cell {
            width: <?php echo $cellSizeW; ?>px;
            height: <?php echo $cellSizeH ?>px;
            position: absolute;
        }

        .terrain0 {
            background-color: blue;
        }
        .terrain1 {
            background-color: green;
        }
        .terrain2 {
            background-color: darkgreen;
        }
        .terrain3 {
            background-color: darkolivegreen;
        }
        .terrain4 {
            background-color: darkkhaki;
        }
        .terrain5 {
            background-color: tan;
        }
        .terrain6 {
            background-color: darkgrey;
        }
        .terrain7 {
            background-color: grey;
        }
        .terrain8 {
            background-color: lightsteelblue;
        }
        .terrain9 {
            background-color: aliceblue;
        }

    </style>
</head>
<body>

<div id="map"></div>

<script>
    const mapData = [

        <?php for ($y=0; $y<$map->getHeigth(); $y++): ?>
        [<?php for ($x=0; $x<$map->getWidth(); $x++): ?><?php echo (isset($map_arr[$y][$x])?(int) ((int)$map_arr[$y][$x]/2):0); ?>,<?php endfor; ?>],
        <?php endfor; ?>
    ];
    const mapHeightColors = [

    ];

    const mapWidth = mapData.length;
    const mapHeight = mapData[0].length;
    const cellSizeH = <?php echo $cellSizeH; ?>;
    const cellSizeW = <?php echo $cellSizeW; ?>;

    const map = document.getElementById('map');

    for (let x = 0; x < mapWidth; x++) {
        for (let z = 0; z < mapHeight; z++) {
            const cellHeight = mapData[x][z];

            const cell = document.createElement('div');
            cell.classList.add('cell');

            cell.classList.add('terrain'+cellHeight);

            cell.style.width = cellSizeW + 'px';
            cell.style.height = cellSizeH + 'px';
//        cell.style.left = x * cellSizeW  + (cellHeight * cellSizeW / 4)  + 'px';
            cell.style.left = x * cellSizeW + 'px';
//        cell.style.top = z * cellSizeH  - (cellHeight * cellSizeH / 2) + 'px';
            cell.style.top = z * cellSizeH + 'px';
            cell.style.zIndex = x + z + cellHeight * 2;
            cell.style.transform='translateZ(' + (cellHeight * 8) + 'px)';



//            const colorIntensity = Math.min(255, cellHeight * 20); // умножаем высоту на 40, ограничим светлоту 255
//            const color = `rgb(${colorIntensity}, ${colorIntensity}, ${colorIntensity})`;
//            cell.style.backgroundColor = color;

            /*
            const cellTop = document.createElement('div');
            cellTop.style.backgroundColor = color;

            cell.appendChild(cellTop);
    */
            map.appendChild(cell);
        }
    }
</script>

</body>
</html>
