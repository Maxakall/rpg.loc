<?php

namespace classes\enums;

enum ActivationEventEnum: string
{
    case onUse = 'При использовании'; // Если ударили, или использовали предмет
    case onCast = 'При касте'; // Если использовали заклинание
    case onDie = 'После смерти'; // Если обладатель умер
    case onKill = 'При убийстве'; // Если кого-то грохнули
    case onWear = 'При экипировке'; // Если экипировали предмет

}
