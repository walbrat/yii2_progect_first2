<?php

namespace app\controllers;

use app\models\AgentModel;
use app\models\Category;
use app\repositories\AgentRepository;
use app\models\AgentDateFilterModel;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $data = Yii::$app->request->post();
        $completedAfter = $data['AgentDateFilterModel']['completedAfter'];
        $completedBefore = $data['AgentDateFilterModel']['completedBefore'];

        $rows = (new AgentRepository())->findByCategories($completedAfter, $completedBefore);

        $agents = [];
        $agentsMap = $this->toMap($rows);
        foreach (array_keys($agentsMap) as $agent) {
            $model = new AgentModel();
            $model->checkAmount = $agentsMap[$agent][Category::CHECK];
            $model->disconnectionAmount = $agentsMap[$agent][Category::DISCONNECTION];
            $model->techAmount = $agentsMap[$agent][Category::TECH];
            $model->otherAmount = $agentsMap[$agent][Category::OTHER];
            $model->summary = $model->checkAmount + $model->disconnectionAmount + $model->techAmount + $model->otherAmount;
            $model->name = $agent;

            $agents[] = $model;
        }

        return $this->render('index', ['agents' => $agents, 'model' => new AgentDateFilterModel($completedAfter, $completedBefore)]);
    }

    /**
     * @param $rows
     * @return array
     */
    public function toMap($rows)
    {
        $agentsMap = [];
        foreach ($rows as $item) {
            $agent = $item['agent'];
            $category = $item['category'];
            $count = $item['count'];

            if (!isset($agentsMap[$agent])) {
                $agentsMap[$agent] = [];
            }
            $agentsMap[$agent][$category] = $count;
        }

        return $agentsMap;
    }
}
