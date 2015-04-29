<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_name
 * @property string $description
 * @property integer $menu_order
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'menu_order'], 'integer'],
           // [['category_name'], 'required'],
            [['category_name', 'description', 'menu_order', 'meta_title', 'meta_description', 'meta_keywords'], 'required','on' => 'create'],
            [['description', 'meta_title', 'meta_description', 'meta_keywords', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'menu_order' => 'Menu Order',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function search($params)
    {
         
         $query = category::find();
         $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
            'pagination' => [
            'pageSize' => Yii::$app->session->get('pagging'),
            
    ],
        ]);
      if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
            
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_name' => $this->category_name,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);
            

        return $dataProvider;
    }
    public function findCategory($catName)
    {
       return  $this->find()->select(['id'])->where(['category_name'=>$catName])->one();
        
    }
    public function findCategoryName($id)
    {
       return  $this->find()->select(['category_name'])->where(['id'=>$id])->one();
        
    }
}
