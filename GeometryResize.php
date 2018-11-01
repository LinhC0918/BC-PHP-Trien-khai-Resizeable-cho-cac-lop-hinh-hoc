<?php
include 'Resize.php';
include 'Shape.php';

class Circle extends Shape implements Resizeable
{
    public $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function resize($percent)
    {
        $this->radius *= $percent / 100;
    }
}

class Rectangle extends Shape implements Resizeable
{
    public $width;
    public $height;

    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }

    public function resize($percent)
    {
        $this->width *= $percent / 100;
    }
}

class Square extends Rectangle
{
    public function __construct($name, $width, $height)
    {
        parent::__construct($name, $width, $height);
    }
}

$resizes[0] = new Circle('circle', 50);
$resizes[1] = new Rectangle('rectangle', 120, 220);
$resizes[2] = new Square('square', 120, 120);
echo 'Pre Resize: <br>';
foreach ($resizes as $resize) {
    echo $resize->show() . ' Area: ' . $resize->calculateArea() . '<br>';
}
echo 'After Resize: <br>';
$random = random_int(1,100);
foreach ($resizes as $resize) {
    $resize->resize($random);
    echo $resize->show() . ' Area: ' . $resize->calculateArea() . '<br>';
}

