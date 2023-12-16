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
            background-color: #000;
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
    </style>
</head>
<body>

<div id="map"></div>

<script>
    const mapData = [
        [1, 2, 3],
        [2, 3, 4],
        [3, 4, 5]
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

            cell.style.width = cellSize + 'px';
            cell.style.height = cellSize + 'px';
            cell.style.left = (z - x) * cellSize / 2 + 'px';
            cell.style.top = (z + x) * cellSize / 4 - (cellHeight * cellSize / 4) + 'px';
            cell.style.zIndex = x + z;

            const colorIntensity = Math.min(255, cellHeight * 20); // умножаем высоту на 40, ограничим светлоту 255
            const color = `rgb(${colorIntensity}, ${colorIntensity}, ${colorIntensity})`;

            const cellTop = document.createElement('div');
            cellTop.style.backgroundColor = color;
            cell.appendChild(cellTop);

            map.appendChild(cell);
        }
    }
</script>

</body>
</html>