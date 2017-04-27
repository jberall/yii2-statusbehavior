<?php

namespace jberall\statusbehavior;

use yii\db\BaseActiveRecord;

/**
 * Description of StatusBehavior
 * When a status is null set to 0.
 * @author Jonathan Berall <jberall@gmail.com>
 */
class StatusBehavior extends \yii\behaviors\AttributeBehavior
{
    /**
     * @var string the attribute that will receive timestamp value
     * Set this property to false if you do not want to record the creation time.
     */
    public $status_column = 'status_id';
 
    /**
     * @inheritdoc
     *
     * In case, when the value is `null`, the result of the PHP function [0]
     * will be used as value.
     */
    public $value;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->status_column],
                BaseActiveRecord::EVENT_BEFORE_UPDATE => [$this->status_column],
            ];
        }
    }

    /**
     * @inheritdoc
     *
     * In case, when the [[value]] is `null`, the result 0
     * will be used as value.
     */
    protected function getValue($event)
    {
        if (!$this->owner->{$this->status_column}) {
            return 0;
        } 
        return $this->owner->{$this->status_column};
    }


}

