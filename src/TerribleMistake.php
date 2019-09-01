<?php
namespace Dedobbin\TerribleSolution;

use Exception;
use Facade\IgnitionContracts\Solution;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;

class TerribleMistake extends Exception implements ProvidesSolution
{
    public function getSolution(): Solution
    {
        return new TerribleSolution();    
    }
}