<?php

namespace classes;

class Map
{
    protected array $map;
    protected int $heigth;
    protected int $width;

    /**
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /**
     * @return int
     */
    public function getHeigth(): int
    {
        return $this->heigth;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }


    public function mapGenerator(int $width, int $height, $peaks, $hills): array
    {
        $this->heigth = $height;
        $this->width = $width;
        $this->generateMountain(-1, 0, 4, 6, $this->generateMountain($hills, 0, 7, 13, $this->generateMountain($peaks, 0)));
        $this->makeMapSmooth();
        $this->makeRiverSmooth($this->generateRiver());
        $this->makeRiverSmooth($this->generateRiver());
        return $this->map;
    }

    private function generateMountain(int $peaks = 0, int $max_distance = 0, int $height_min = 15, int $height_max = 19, $next_point_arr = []): array
    {
        if (!$max_distance) $max_distance = rand(3, 6);

        $from_x = 2;
        $from_y = 2;

        $to_x = $this->width - 3;
        $to_y = $this->heigth - 3;
        $peak_x = rand($from_x, $to_x);
        $peak_y = rand($from_y, $to_y);

        $i = 0;
        do {
            $distance = rand(2, $max_distance);

            $this->map[$peak_y][$peak_x] = rand($height_min, $height_max);
            for ($y = max($peak_y - $distance, 0); $y <= min($peak_y + $distance, $this->heigth - 1); $y++) {
                for ($x = max($peak_x - $distance, 0); $x <= min($peak_x + $distance, $this->width - 1); $x++) {
                    if (($x != $peak_x || $y != $peak_y)) {
                        if ((!isset($this->map[$y][$x]) || isset($next_point_arr[$y . '-' . $x])) && (abs($x - $peak_x) == $distance || abs($y - $peak_y) == $distance)) {
                            // Если макс дист и (+ не проходит через существующие точки или + пересекается с другим +)
                            $this->map[$y][$x] = '+';
                            $next_point_arr[$y . '-' . $x] = '+';
                        } elseif (!isset($this->map[$y][$x]) || $this->map[$y][$x] < 6) {
                            $this->map[$y][$x] = '-';
                            unset($next_point_arr[$y . '-' . $x]);
                        }
                    }
                }
            }
            if (empty ($next_point_arr)) break;
            [$peak_y, $peak_x] = (explode('-', array_rand($next_point_arr, 1)));
            unset($next_point_arr[$peak_y . '-' . $peak_x]);
            $i++;
        } while ($peaks == -1 && count($next_point_arr) || $i < $peaks);
        return $next_point_arr;
    }

    private function generateForest()
    {

    }

    private function calculatePriority($previous_level, $current_level, $difference_direction): int
    {
        return $current_level == -1 ? 0 : 10 - abs($previous_level - $current_level) + $difference_direction;
    }
    private function makeRiverSmooth($river)
    {
        for($i=5; $i>1; $i--) {
            foreach ($river as $river_y => $arr) {
                foreach ($arr as $river_x => $val) {
                    for ($y = -1; $y <= 1; $y++) {
                        for ($x = -1; $x <= 1; $x++) {
                            if (isset($this->map[$river_y + $y][$river_x + $x]) && !isset($river[$river_y + $y][$river_x + $x]) && !rand(0,$i)) {
                                $this->map[$river_y + $y][$river_x + $x] = ceil(1+$this->map[$river_y + $y][$river_x + $x] / $i);
                                $river[$river_y + $y][$river_x + $x] = 0;
                            }
                        }
                    }
                }
            }
        }

    }

    private function generateRiver(): array
    {
        $previous_direction = '';
        $river = [];

        $start_range = rand(0, $this->width + $this->heigth - 1);

        if ($start_range / $this->width >= 1) {
            $start_x = 0;
            $previous_direction='left';
            $start_y = $start_range - $this->width;
        } else {
            $start_y = 0;
            $previous_direction='top';
            $start_x = $start_range;
        }

        $destination_range = rand(0, $this->width + $this->heigth - 1);
        if ($destination_range / $this->width >= 1) {
            $destination_x = $this->width - 1;
            $destination_y = $destination_range - $this->width;
        } else {
            $destination_y = $this->heigth - 1;
            $destination_x = $destination_range;
        }

        $this->map[$destination_y][$destination_x] = 0;

        $current_x = $start_x;
        $current_y = $start_y;
        $river[$current_y][$current_x]=0;
        do {
            $level = $this->map[$current_y][$current_x];
            $this->map[$current_y][$current_x] = 0;
            $top = $current_y - 1 >= 0 ? $this->map[$current_y - 1][$current_x] : -1;
            $bottom = $current_y + 1 <= $this->heigth - 1 ? $this->map[$current_y + 1][$current_x] : -1;
            $left = $current_x - 1 >= 0 ? $this->map[$current_y][$current_x - 1] : -1;
            $right = $current_y + 1 <= $this->heigth - 1 ? $this->map[$current_y][$current_x + 1] : -1;

            $direction_array = [
                'top' => $this->calculatePriority($level, $top, abs($destination_y - $current_y) > abs($destination_y - ($current_y - 1)) ? 50 : 0),
                'bottom' => $this->calculatePriority($level, $bottom, abs($destination_y - $current_y) > abs($destination_y - ($current_y + 1)) ? 50 : 0),
                'left' => $this->calculatePriority($level, $left, abs($destination_x - $current_x) > abs($destination_x - ($current_x - 1)) ? 50 : 0),
                'right' => $this->calculatePriority($level, $right, abs($destination_x - $current_x) > abs($destination_x - ($current_x + 1)) ? 50 : 0),
            ];
            $direction_array[$previous_direction] = 0;

            $random_direction = rand(1, array_sum($direction_array));

            if ($random_direction < $direction_array['top']) {
                $current_y = max($current_y - 1, 0);
                $previous_direction='bottom';
            } elseif ($random_direction < ($direction_array['top'] + $direction_array['bottom'])) {
                $current_y = min($current_y + 1, $this->heigth-1);
                $previous_direction='top';
            } elseif ($random_direction < ($direction_array['top'] + $direction_array['bottom'] + $direction_array['left'])) {
                $current_x = max($current_x - 1, 0);
                $previous_direction='right';
            } else {
                $current_x = min($current_x + 1, $this->width-1);
                $previous_direction='left';
            }
            //echo $current_y.':'.$destination_y.' - '. $current_x.':'.$destination_x.' - '.$random_direction.PHP_EOL;
            $river[$current_y][$current_x] = 0;
        } while ($current_x != $destination_x || $current_y != $destination_y);

        return $river;
    }

    private function makeMapSmooth()
    {
        $level = 19;
        for ($i = $level; $i >= 0; $i--) {
            for ($y = 0; $y < $this->heigth; $y++) {
                for ($x = 0; $x < $this->width; $x++) {
                    if (isset($this->map[$y][$x]) && $this->map[$y][$x] == $i) {
                        if (!isset($this->map[$y - 1][$x]) || $this->map[$y - 1][$x] < $i) $this->map[$y - 1][$x] = $i - 1;
                        if (!isset($this->map[$y + 1][$x]) || $this->map[$y + 1][$x] < $i) $this->map[$y + 1][$x] = $i - 1;
                        if (!isset($this->map[$y][$x - 1]) || $this->map[$y][$x - 1] < $i) $this->map[$y][$x - 1] = $i - 1;
                        if (!isset($this->map[$y][$x + 1]) || $this->map[$y][$x + 1] < $i) $this->map[$y][$x + 1] = $i - 1;
                    } else if (!isset($this->map[$y][$x]) || $this->map[$y][$x] < 2) {
                        $this->map[$y][$x] = 2;
                    }
                }

            }
        }

    }

    public function drawMap()
    {
        for ($y = 0; $y < $this->heigth; $y++) {
            for ($x = 0; $x < $this->width; $x++) {
                echo $this->map[$y][$x] ?? 0;
            }
            echo PHP_EOL;
        }
    }

}