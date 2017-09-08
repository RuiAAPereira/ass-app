<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = Yii::t('app', 'Create Centros Custo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centros Custos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centros-custo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
