<?php
declare(strict_types=1);

use classes\Body;
use classes\Effect;
use classes\Effects;
use classes\enums\BodyTypesEnum;
use classes\BodyType;
use classes\enums\EffectTypesEnum;
use classes\Race;
use classes\Spirit;
use classes\Type;
use classes\Weapon;
use classes\enums\activationEventEnum;


require_once dirname(__DIR__).'/rpg.loc/vendor/autoload.php';

//TODO: Эффекты, проклятия, благославления, влияние окружения


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

//require_once dirname(__DIR__).'/rpg.loc/draw_map.php';
