<?php

use console\components\Migration;
use yii\db\Query;

class m190814_100005_insert_agreements extends Migration {

    public function safeUp() {

        $this->delete('agreement_translation');
        $this->delete('agreement');

        $loremIpsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Lectus nulla at volutpat diam ut venenatis tellus in. Nulla aliquet porttitor lacus luctus accumsan. 
        Donec ultrices tincidunt arcu non sodales neque sodales ut etiam. 
        Venenatis a condimentum vitae sapien pellentesque habitant morbi. Sed tempus urna et pharetra. Mattis nunc sed blandit libero. 
        In nisl nisi scelerisque eu ultrices. Urna molestie at elementum eu facilisis sed odio morbi quis. Convallis posuere morbi leo urna. 
        Sed augue lacus viverra vitae. Pellentesque habitant morbi tristique senectus. Et odio pellentesque diam volutpat commodo sed egestas.';
        
        $enId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);;
        $plId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        
        $this->insert('agreement', [
            'symbol' => 'terms-of-use',
            'is_required' => true
        ]);

        $agreementId = $this->db->getLastInsertID();
        $this->insert('agreement_translation', [
            'agreement_id' => $agreementId,
            'language_id' => $plId,
            'content' => '<h2>Regulamin serwisu</h2>'.
            '<div>'.$loremIpsum.'</div>'
        ]);
        
        $this->insert('agreement_translation', [
            'agreement_id' => $agreementId,
            'language_id' => $enId,
            'content' => '<h2>Terms of use</h2>'.
            '<div>'.$loremIpsum.'</div>'
        ]);

        $this->insert('agreement', [
            'symbol' => 'personal-data-processing',
            'is_required' => true
        ]);

        $agreementId = $this->db->getLastInsertID();
        $this->insert('agreement_translation', [
            'agreement_id' => $agreementId,
            'language_id' => $plId,
            'content' => '<h2>Przetwarzanie danych osobowych</h2>'.
            '<div>'.$loremIpsum.'</div>'
        ]);
        
        $this->insert('agreement_translation', [
            'agreement_id' => $agreementId,
            'language_id' => $enId,
            'content' => '<h2>Personal data processing</h2>'.
            '<div>'.$loremIpsum.'</div>'
        ]);
    }

    public function safeDown() {
        $this->delete('agreement_translation');
        $this->delete('agreement');
    }
}
