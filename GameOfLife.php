<?
class GameOfLife
{
    public function evolve($grid)
    {
        $grid = trim($grid);

        $gridArray = $this->convertGridToArray($grid);
        $liveNeighbours = 0;

        $newGridArray = array(
            array(),
            array(),
            array()
        );

        if (count($gridArray) == 1) {
            return '-';
        }

        foreach ($gridArray as $rowKey=>$row) {
            foreach ($row as $cellKey=>$cell) {
                if (isset($gridArray[$rowKey-1][$cellKey-1]) && $gridArray[$rowKey-1][$cellKey-1] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey-1][$cellKey]) && $gridArray[$rowKey-1][$cellKey] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey-1][$cellKey+1]) && $gridArray[$rowKey-1][$cellKey+1] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey][$cellKey-1]) && $gridArray[$rowKey][$cellKey-1] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey][$cellKey+1]) && $gridArray[$rowKey][$cellKey+1] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey+1][$cellKey-1]) && $gridArray[$rowKey+1][$cellKey-1] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey+1][$cellKey]) && $gridArray[$rowKey+1][$cellKey] == '*') {
                    $liveNeighbours++;
                }

                if (isset($gridArray[$rowKey+1][$cellKey+1]) && $gridArray[$rowKey+1][$cellKey+1] == '*') {
                    $liveNeighbours++;
                }

                if ($gridArray[$rowKey][$cellKey] == '-') {
                    if ($liveNeighbours == 3) {
                        $newGridArray[$rowKey][$cellKey] = '*';
                    } else {
                        $newGridArray[$rowKey][$cellKey] = '-';
                    }
                } elseif ($liveNeighbours == 2 || $liveNeighbours == 3) {
                    $newGridArray[$rowKey][$cellKey] = '*';
                } else {
                    $newGridArray[$rowKey][$cellKey] = '-';
                }

                $liveNeighbours = 0;
            }
        }

        return $this->convertToString($newGridArray);

    }

    public function convertGridToArray($grid)
    {
        $rows = explode("\n", $grid);
        $rowCount = 0;

        foreach($rows as $row) {
            $cells = str_split($row);
            $gridArray[] = $cells;
        }
        return $gridArray;
    }

    public function convertToString($grid)
    {
        $stringRows = array();

        foreach ($grid as $row) {
            $stringRows[] = implode('', $row);
        }

        return implode("\n", $stringRows);

    }
}