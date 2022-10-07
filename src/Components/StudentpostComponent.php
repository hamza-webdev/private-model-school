<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('studentpost')]
class StudentpostComponent
{
    public string $name;
    public string $surname;
    public string $date_naissance;
    public string $date_inscrit;
    public string $sexe;
    public string $info_perso;

}
