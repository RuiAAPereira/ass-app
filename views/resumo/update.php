<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resumo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Resumo',
]) . $model->resumo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resumos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resumo_id, 'url' => ['view', 'id' => $model->resumo_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="resumo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
