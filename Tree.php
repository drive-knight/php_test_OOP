<?php

abstract class Tree
{
    protected $fruits = null;

    abstract protected function giveHarvest();

    abstract protected function getRegNumber();

    abstract protected function countFruitWeight($items);

    public function get()
    {
        return $this->fruits;
    }
}


class AppleTree extends Tree
{
    private static int $instance_apple_tree = 0;
    private int $reg_number;
    private array $apple_weight;

    public function __construct()
    {
        $this->reg_number = ++self::$instance_apple_tree;
        $items = self::giveHarvest();
        $this->apple_weight = $this->countFruitWeight($items);
    }

    protected function countFruitWeight($items): array
    {
       $res_array = [];
       for ($i = 0; $i < $items; $i++) {
           $res_array[] = random_int(150, 180);
       }
       return $res_array;
    }

    protected function giveHarvest(): ?int
    {
        if (is_null($this->fruits)) {
            return $this->fruits = random_int(40, 50);
        }
        return $this->fruits;
    }

    public function getRegNumber(): int
    {
        return $this->reg_number;
    }

    public function getFruitWeight(): array
    {
        return $this->apple_weight;
    }
}

class PearTree extends Tree
{
    private static int $instance_pear_tree = 0;
    private int $reg_number;
    private array $pear_weight;

    public function __construct()
    {
        $this->reg_number = ++self::$instance_pear_tree;
        $items = self::giveHarvest();
        $this->pear_weight = $this->countFruitWeight($items);
    }

    protected function countFruitWeight($items): array
    {
        $res_array = [];
        for ($i = 0; $i < $items; $i++) {
            $res_array[] = random_int(130, 170);
        }
        return $res_array;
    }

    protected function giveHarvest(): ?int
    {
        if (is_null($this->fruits)) {
            return $this->fruits = random_int(0, 20);
        }
        return $this->fruits;
    }

    public function getRegNumber(): int
    {
        return $this->reg_number;
    }

    public function getFruitWeight(): array
    {
        return $this->pear_weight;
    }
}
