<?php

namespace app\models;

use yii\base\Model;

class AgentDateFilterModel extends Model
{
    public $completedAfter;
    public $completedBefore;

    /**
     * AgentDateFilterModel constructor.
     * @param $completedAfter
     * @param $completedBefore
     */
    public function __construct($completedAfter, $completedBefore)
    {
        $this->completedAfter = $completedAfter;
        $this->completedBefore = $completedBefore;
    }
}
