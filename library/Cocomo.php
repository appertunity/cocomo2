<?php


namespace Library\Appertunity;

//basic
class Cocomo
{

    const ESTIMATE_EFFORT_APPLIED   = 'EFFORT_APPLIED';
    const ESTIMATE_DEVELOPMENT_TIME = 'DEVELOPMENT_TIME';
    const ESTIMATE_PEOPLE_REQUIRED  = 'PEOPLE_REQUIRED';

    const PROJECT_ORGANIC      = 'O';
    const PROJECT_SEMIDETACHED = 'S';
    const PROJECT_EMBEDDED     = 'E';

    private $availableProjectClasses = [
        // Organic projects - "small" teams with "good" experience working with "less than rigid" requirements
        self::PROJECT_ORGANIC      => ['a' => 2.4, 'b' => 1.05, 'c' => 2.5, 'd' => 0.38],
        // Semi-detached projects - "medium" teams with mixed experience working with a mix of rigid and less than rigid requirements
        self::PROJECT_SEMIDETACHED => ['a' => 3.0, 'b' => 1.12, 'c' => 2.5, 'd' => 0.35],
        // Embedded projects - developed within a set of "tight" constraints. It is also combination of organic and semi-detached projects.(hardware, software, operational, ...)
        self::PROJECT_EMBEDDED     => ['a' => 3.6, 'b' => 1.20, 'c' => 2.5, 'd' => 0.32]
    ];
    private $projectClass = self::PROJECT_ORGANIC;

   public function __construct($projectClass = self::PROJECT_ORGANIC, $multipliers = array())
    {
        if (!array_key_exists($projectClass, $this->availableProjectClasses)) {
            throw new \UnexpectedValueException('Invalid project class provided!');
        }
        $this->projectClass = $projectClass;

       
    }
    public function estimate($sloc)
    {
        if (!is_int($sloc)) {
            throw new \InvalidArgumentException('SLOC must be an integer!');
        }
        $projectClassConstants = $this->availableProjectClasses[$this->projectClass];

        $ai = $projectClassConstants['a'];
        $bi = $projectClassConstants['b'];
        $ci = $projectClassConstants['c'];
        $di = $projectClassConstants['d'];

        $effortApplied   = $ai * pow($sloc / 1000, $bi);
        $developmentTime = $ci * pow($effortApplied, $di);
        $peopleRequired  = $effortApplied / $developmentTime;

        return array(
            self::ESTIMATE_EFFORT_APPLIED   => $effortApplied,
            self::ESTIMATE_DEVELOPMENT_TIME => $developmentTime,
            self::ESTIMATE_PEOPLE_REQUIRED  => $peopleRequired
        );
    }
}