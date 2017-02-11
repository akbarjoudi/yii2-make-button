<?php
namespace aki\button\components;

/**
 * @property Creative $creative 
 * Description of Style
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class Style extends \yii\base\Component{
    
    /**
     * 
     * @return \aki\button\components\Creative
     */
    public function getCreative() {
        return new Creative();
    }
    
    
}
