<?php

class FruitPicker
{
    private array $garden = [];

    public function showGarden(): array
    {
        return $this->garden;
    }

    /**
     Trees list: Apple Tree, Pear Tree
     */
    public function addTree($name, $quantity)
    {
        for ($i = 0; $i < $quantity; $i++) {
            switch ($name) {
                case 'Pear Tree':
                    $tree = new PearTree();
                    $this->garden[] = $tree;
                    break;
                case 'Apple Tree':
                    $tree = new AppleTree();
                    $this->garden[] = $tree;
                    break;
                default:
                    echo 'Please enter a valid tree name and try again';
                    die();
            }
        }
    }

    public function gatherFruits(): int
    {
        $result = 0;
        foreach ($this->garden as $tree) {
            $result += $tree->get();
        }
        return $result;
    }

    public function gatherTypeFruits(): array
    {
        $result = ['Apples' => 0, 'Pears' => 0];
        foreach ($this->garden as $fruit) {
            if (get_class($fruit) === PearTree::class) {
                $result['Pears'] += $fruit->get();
            }
            if (get_class($fruit) === AppleTree::class) {
                $result['Apples'] += $fruit->get();
            }
        }
        return $result;
    }

    public function countWeight(): array
    {
        $res_apples = 0;
        $res_pears = 0;
        foreach ($this->garden as $fruit) {
            if (get_class($fruit) === PearTree::class) {
                foreach ($fruit->getFruitWeight() as $item) {
                    $res_pears += $item;
                }
            }
            if (get_class($fruit) === AppleTree::class) {
                foreach ($fruit->getFruitWeight() as $item) {
                    $res_apples += $item;
                }
            }
        }
        return array('Weight of apples' => $res_apples, 'Weight of pears' => $res_pears);
    }
}
