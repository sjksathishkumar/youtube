<?php

namespace common\components;
 
use Yii;
use yii\base\Component;
 
class CommonFunction extends Component {
 
    /**
     *  return subscription plan
    */
    public function subscriptionPlan($status)
    {
        $returnVal = "";
        if ($status == 1)
        {
            $returnVal = "Paid";
        }
        else if ($status == 0)
        {
            $returnVal = "Free";
        }
        else
        {

        }
        return $returnVal;
    }
 
}


?>