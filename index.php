<?php
declare(strict_types=1);

use classes\Body;
use classes\Effect;
use classes\Effects;
use classes\enums\bodyTypesEnum;
use classes\BodyType;
use classes\enums\EffectTypesEnum;
use classes\Race;
use classes\Spirit;
use classes\Type;
use classes\Weapon;
use classes\enums\activationEventEnum;


require_once dirname(__DIR__).'/rpg.loc/vendor/autoload.php';

//TODO: Эффекты, проклятия, благославления, влияние окружения
// подключить git



//require_once('classes\body_types.php');

/**
 * Class Spirit
 */

class Stat {
    public string $smin;
    public string $smax;
}

$human = new Body();
$human->addBodyType(new BodyType(BodyTypesEnum::Head, new Weapon('Шлем', bodyTypesEnum::Head,10,5)));
$human->addBodyType(new BodyType(BodyTypesEnum::Body));
$human->addBodyType(new BodyType(BodyTypesEnum::RightHand));
$effects = new Effects(
    new Effect(EffectTypesEnum::Attack, ActivationEventEnum::onUse, 7, false, 0,false,false,0, 0),
    new Effect(EffectTypesEnum::Defense, ActivationEventEnum::onUse, 3, false, 0,false,false,0, 0))
;
$human->addBodyType(new BodyType(BodyTypesEnum::LeftHand, new Weapon('Двуручный меч', bodyTypesEnum::LeftHand,0,50, $effects,bodyTypesEnum::RightHand,bodyTypesEnum::AnyBody)));

$human->addBodyType(new BodyType(BodyTypesEnum::Legs));
$human->addBodyType(new BodyType(BodyTypesEnum::Feets, new Weapon('Башмаки', bodyTypesEnum::Feets,8, 0), new Weapon('Наколенники', bodyTypesEnum::Head,3,0)));
$human->addBodyType(new BodyType(BodyTypesEnum::Inventory));



$zombie = new Spirit(
    new Type(
        'Воин',
        '+ 10% к атаке'
    ),
    new Race(
        'zombe',
        'Зомбак',
        '-20% хп'
    ),
    'Эдуард',
    'Статусы хп мп и т.д.',
    'агрессивный к живому',
    $human,
);

/*
echo '<pre>';
print_r($zombie);

$test = new BodyType(BodyTypesEnum::Head);

 */

$map = new \classes\Map();
$map_arr = $map->mapGenerator(100,50, 9, 40, 80);
//$map->drawMap();


?>
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 10px;
            height: 10px;
            text-align: center;
        }

        . {
            background-color: gray;
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

        .hill {
            background-color: brown;
        }

    </style>
</head>
<body>
<table>
    <?php for ($y=0; $y<$map->getHeigth(); $y++): ?>
        <tr>
            <?php for ($x=0; $x<$map->getWidth(); $x++): ?>
                <?php $class = isset($map_arr[$y][$x])?(int) ((int)$map_arr[$y][$x]/2):0; ?>
                <td class="<?php echo 'terrain'.$class; ?>"></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>
<pre>
<?php
// $map->drawMap();
//test
?>
</pre>
</body>
</html>
