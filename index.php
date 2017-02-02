<?php

class People
{
    /**
     * Initial property
     * @var string $name
     */
    public $name;
    /**
     * Initial property
     * @var integer $age
     */
    public $age;
    /**
     * Initial property
     * @var string $sex
     */
    public $sex;
    /**
     * Initial property
     * @var string $answer
     */
    public $answer;

    /**
     * Initial People constructor.
     * @param $name
     * @param $age
     * @param $sex
     */
    public function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    /**
     * Initial method
     */
    public function inspectionAge()
    {
        if ($this->age < 0 && $this->age > 100) {
            $this->answer = $this->name . " don`t born or died";
        }
        $this->answer = "Your name: " . $this->name . "<br/>"
            . "You " . $this->age . " years" . "<br/>"
            . "You are a " . $this->sex;
        echo $this->answer;
    }
}

echo "<h3>";
$enterUserParams = new People('Alex', 24, 'Man');
$enterUserParams->inspectionAge();
echo "</h3>";