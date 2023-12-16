<?php

// Генерация высотной карты 100x100
$map = [];
for ($i = 0; $i < 100; $i++) {
    $row = [];
    for ($j = 0; $j < 100; $j++) {
        $row[] = rand(0, 100); // Диапазон высот: 0-100
    }
    $map[] = $row;
}

// Функция для определения типа террейна в зависимости от высоты
function getTerrainType($height) {
    if ($height <= 30) {
        return 'river'; // Река
    } elseif ($height <= 50) {
        return 'forest'; // Лес
    } elseif ($height <= 70) {
        return 'plain'; // Равнина
    } elseif ($height <= 90) {
        return 'hill'; // Холмы
    } else {
        return 'mountain'; // Горы
    }
}

// Функция для отображения цвета в зависимости от высоты
function getTerrainColor($height) {
    if ($height <= 30) {
        return '#00f'; // Река - синий цвет
    } elseif ($height <= 50) {
        return '#008000'; // Лес - зеленый цвет
    } elseif ($height <= 70) {
        return '#ffff00'; // Равнина - желтый цвет
    } elseif ($height <= 90) {
        return '#8b4513'; // Холмы - коричневый цвет
    } else {
        return '#808080'; // Горы - серый цвет
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Объемная карта</title>
    <style>
        /* CSS для отображения объемной карты в изометрии */
        .tile {
            width: 10px;
            height: 10px;
            display: inline-block;
            transform: rotateX(45deg) rotateZ(-45deg);
            transform-origin: 50% 50%;
        }

        .river {
            background-color: #00f;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .forest {
            background-color: #008000;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .plain {
            background-color: #ffff00;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .hill {
            background-color: #8b4513;
            border: 1px solid #000;
            box-sizing: border-box;
        }

        .mountain {
            background-color: #808080;
            border: 1px solid #000;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<?php
// Отображение объемной карты в изометрии
for ($i = 0; $i < 100; $i++) {
    for ($j = 0; $j < 100; $j++) {
        $height = $map[$i][$j];
        $type = getTerrainType($height);
        $color = getTerrainColor($height);
        echo "<div class=\"tile $type\" style=\"background-color: $color;\"></div>";
    }
    echo "<br>";
}
?>

</body>
</html>