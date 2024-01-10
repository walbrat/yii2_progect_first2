<?php

namespace app\repositories;

use app\models\Status;
use yii\base\Component;
use yii\db\Query;

class AgentRepository extends Component
{


    public function findByCategories($completedAfter, $completedBefore)
    {
        $query = (new Query())
            ->select(['agent', 'category', 'COUNT(*) as count'])
            ->from('request')
            ->where(['status' => Status::DONE]);


        if ($completedAfter != null)
        {
            $query->andWhere(['>=', 'completedAt', $completedAfter]);
        }
        if ($completedBefore != null)
        {
            $query->andWhere(['<', 'completedAt', $completedBefore]);
        }

        return $query
            ->groupBy('agent,category')
            ->all();
    }
}