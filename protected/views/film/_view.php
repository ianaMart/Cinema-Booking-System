<div class="poster">
    <div class="posterimg">
        <?php
        $text='<img src="' . Yii::app()->getBaseUrl() . '/images/posters/' . CHtml::encode($data->film_id) . '.jpg" alt="' . CHtml::encode($data->title) . ' Poster" />';
        echo CHtml::link($text, array('film/view', 'id'=>$data->film_id));
        ?>
        
    </div>
    <?php echo '<p>' . CHtml::link(CHtml::encode($data->title), array('film/view', 'id'=>$data->film_id)) . '</p>'; ?>
    
</div>
