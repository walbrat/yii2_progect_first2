<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';

?>
<?php
$form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'POST',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false
]);
?>
<?=
$form->field($model, 'completedAfter')->widget(DatePicker::class,
    [
        'name'  => 'from_date',
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ]);
?>
<?=
$form->field($model, 'completedBefore')->widget(DatePicker::class,
    [
        'name'  => 'to_date',
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ]);
echo Html::submitButton('Update', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>




<table class="table table-bordered">
    <thead>
    <tr>
        <th>ПІБ (кто решил заявку)</th>
        <th>Исключение</th>
        <th>Проверка/Утверждение</th>
        <th>Технический вопрос</th>
        <th>Другое</th>
        <th>Всего</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($agents as $agent): ?>
        <tr>
            <td><?php echo $agent->name; ?></td>
            <td><?php echo $agent->disconnectionAmount; ?></td>
            <td><?php echo $agent->checkAmount; ?></td>
            <td><?php echo $agent->techAmount; ?></td>
            <td><?php echo $agent->otherAmount; ?></td>
            <td><?php echo $agent->summary; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>