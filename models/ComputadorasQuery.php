<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Computadoras]].
 *
 * @see Computadoras
 */
class ComputadorasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Computadoras[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Computadoras|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
