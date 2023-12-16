<!DOCTYPE html>
<html>
<head>
    <style>
        /* Задаем начальные стили */
        #map {
            display: grid;
            grid-template-columns: repeat(50, 1fr);
            transform: rotate(-30deg) scale(1.2) skewX(40deg);
        }
        .cell {
            width: 12px;
            height: 12px;
            transform-origin: center center;
            transform: rotate(-30deg);
            position: absolute;
        }
    </style>
</head>
<body>
<div id="map"></div>

<script>
    // Массив высот ячеек
    var mapData = [
        [1, 1, 1, 2, 1, 1, 1, ],  // Ваш массив высот
        [1, 1, 2, 3, 2, 1, 1, ],
        [1, 2, 3, 4, 3, 2, 1, ],
        [2, 3, 4, 5, 4, 3, 2, ],
        [1, 2, 3, 4, 3, 2, 1, ],
        [1, 1, 2, 3, 2, 1, 1, ],
        [3, 1, 2, 2, 1, 1, 1, ],
    ];

    var mapContainer = document.getElementById("map");

    // Проходим по массиву высот и создаем ячейки с соответствующими стилями
    for (var i = 0; i < mapData.length; i++) {
        for (var j = 0; j < mapData[i].length; j++) {
            var cell = document.createElement("div");
            cell.classList.add("cell");
            cell.style.backgroundColor = calculateColor(mapData[i][j]);
            cell.style.top = i*12-mapData[i][j]*2+'px';
            cell.style.left = j*12+'px';
            cell.style.zIndex = -j*mapData[i].length+(mapData[i].length-i);
            mapContainer.appendChild(cell);
        }
    }

    // Функция для расчета цвета ячейки на основе высоты
    function calculateColor(height) {
        var lightness = Math.floor(height * 255 / 10); // Масштабирование высоты от 0 до 255
        return "hsl(0, 0%, " + lightness + "%)"; // Возвращает цвет в формате HSL, где яркость изменяется в диапазоне от 0% до 100%
    }
</script>
</body>
</html>