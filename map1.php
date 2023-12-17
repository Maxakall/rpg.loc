<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Isometric Map</title>
    <style>
        body {
            perspective: 500px;
            transform-style: preserve-3d;
        }

        #map {
            width: 300px;
            height: 300px;
            position: relative;
            left: 50%;
            transform: rotateX(45deg) rotateZ(45deg);
            background-color: #333;
        }

        .cell {
            position: absolute;
            transform-origin: bottom center;
        }

        .cell div {
            width: 20px;
            height: 20px;
            transform: rotateX(90deg);
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
        [1, 2, 1],
        [2, 3, 2],
        [3, 2, 5]
    ];
    const mapHeightColors = [

    ];

    const mapWidth = mapData.length;
    const mapHeight = mapData[0].length;
    const cellSize = 20;

    const map = document.getElementById('map');

    for (let x = 0; x < mapWidth; x++) {
        for (let z = 0; z < mapHeight; z++) {
            const cellHeight = mapData[x][z];

            const cell = document.createElement('div');
            cell.classList.add('cell');

            cell.classList.add('terrain'+cellHeight);

            cell.style.width = cellSize + 'px';
            cell.style.height = cellSize + 'px';
            cell.style.left = x * cellSize + 'px';
            cell.style.top = z * cellSize  - (cellHeight * cellSize / 4) + 'px';
            cell.style.zIndex = x + z;

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