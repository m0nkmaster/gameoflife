<?
/**
* testAnyLiveCellWithFewerThanTwoLiveNeighboursDies
* testAnyLiveCellWithTwoOrThreeLiveNeighboursLives
* Any live cell with more than three live neighbours dies
* Any dead cell with exactly three live neighbours becomes a live cell
*
*/
require_once('GameOfLife.php');

class GameOfLifeTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->gol = new GameOfLife;
    }

    public function testAGridOfOneLiveCellDies()
    {
        $grid = "*";
        $this->assertEquals('-', $this->gol->nextGeneration($grid));
    }

    public function testGOLTrimsExtraNewLines()
    {
        $grid = "\n*\n";
        $this->assertEquals('-', $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Threex3LiveCentralCellAndNoNeighboursDies()
    {
        $grid = "---\n-*-\n---";
        $expected = "---\n---\n---";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Threex3LiveCentralCellWithOneNeighboursDies()
    {
        $grid = "---\n**-\n---";
        $expected = "---\n---\n---";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Threex3LiveCentralCellsWithTwoHorizontalNeighboursLives()
    {
        $grid = "---\n***\n---";
        $expected = "-*-\n-*-\n-*-";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Threex3LiveCentralCellWithTwoVerticalNeighboursLives()
    {
        $grid = "-*-\n-*-\n-*-";
        $expected = "---\n***\n---";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Threex3DiagonalCross()
    {
        $grid = "*-*\n-*-\n*-*";
        $expected = "-*-\n*-*\n-*-";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }

    /**
    * @test
    */
    public function Fourx4ShouldDieOnFirstIteration()
    {
        $grid = "*---\n-*--\n---*";
        $expected = "----\n----\n----";
        $this->assertEquals($expected, $this->gol->nextGeneration($grid));
    }
}