<?php

namespace App\DataProvider;

interface TrainingMenuItemRepositoryInterface 
{
    public function search(string $keyword);
}