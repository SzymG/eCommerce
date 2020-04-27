<?php

use console\components\Migration;

class m191025_100215_insert_example_articles extends Migration {

    public function safeUp() {
        $admin = \common\models\ar\User::findOne(['email'=>'admin@absolwenci.com']);
        $acceptedStatus = \common\models\ar\ArticleStatus::findOne(['symbol' => 'accepted']);
        $newStatus = \common\models\ar\ArticleStatus::findOne(['symbol' => 'new']);

        $example_articles = [
            [
                'Politechnika Poznańska - jedna z lepszych uczelni techniczynch w Polsce',
                'Misją Uczelni jest kształcenie na wszystkich stopniach studiów wyższych oraz w trybie kształcenia ustawicznego w ścisłym związku z prowadzonymi na Uczelni pracami naukowymi i badawczo-rozwojowymi oraz we współpracy z przyszłymi pracodawcami absolwentów uczelni i w kontakcie ze społeczeństwem. Wizją jest stworzenie czołowego w kraju uniwersytetu technicznego, dobrze rozpoznawalnego w Europie, liczącego się i poszukiwanego partnera uczelni zagranicznych, gwarantującego wysoką jakość kształcenia oraz światowy poziom prac naukowych i badawczo-rozwojowych. ',
                '2019-10-25 13:11:11',
                1,
                $newStatus->id,
                'odsiafufdsuioufid.jpg'
            ],
            [
                'Politechnika Poznańska - UCZELNIA EUROPEJSKA',
                'Politechnika Poznańska oferuje kształcenie na dziesięciu wydziałach, prowadzących łącznie 29 kierunków studiów. Na uczelni studiuje około 20 tysięcy studentów studiów I i II stopnia, studiów doktoranckich oraz studiów podyplomowych. O ich wykształcenie troszczy się ponad 1200 nauczycieli akademickich. Realizacja misji Uczelni pozwala urzeczywistnić wizję Politechniki, jako czołowego w kraju uniwersytetu technicznego, z aspiracjami do bycia partnerem uczelni europejskich pod względem jakości kształcenia oraz poziomu badań naukowych. Politechnika Poznańska jako pierwsza z polskich uczelni została przyjęta do grona członków CESAER-a (Conference of European Schools for Advanced Engineering Education and Research) ? europejskiej organizacji zrzeszającej najlepsze wyższe szkoły techniczne. Jest członkiem SEFI (Societe Europeenne pour la Formation des Ingenieurs), EUA (European University Association), ADUEM (Alliance of Universities for Democracy) oraz IAU (International Association of Universities).',
                '2019-10-25 13:11:11',
                0,
                $acceptedStatus->id,
                'qwertyuiopzxcvbnm.jpg'
            ],
            [
                'Politechnika Poznańska - NAUKA',
                'Politechnika Poznańska stanowi ważny ośrodek badań naukowych. Z roku na rok udział środków przeznaczonych na badania jest coraz większy. Silną stroną Uczelni jest kadra pracowników naukowych. Ich osiągnięcia naukowe i publikacje stanowią ważny wkład w rozwój współczesnych nauk technicznych. Wielu młodych pracowników i doktorantów zdobywa stypendia naukowe i wyjeżdża za granicę w celu podniesienia swoich kwalifikacji i zdobycia nowych doświadczeń. Naukowcy Uczelni zdobywają najwyższe państwowe nagrody. Fundacja Nauki Polskiej premiująca najlepszych polskich uczonych, trzykrotnie wyróżniła profesorów naszej Uczelni, tzw. polskim Noblem. Politechnika Poznańska z powodzeniem dostosowuje swoje zadania badawcze do aktualnych potrzeb gospodarki, a wynalazki opracowywane na Uczelni otrzymują liczne nagrody na międzynarodowych wystawach i targach.',
                '2019-10-25 13:11:11',
                1,
                $acceptedStatus->id,
                'qazwsxedcrfvttgb.jpg'
            ]
        ];


        foreach($example_articles as $article) {
            $this->insert('article', [
                'title' => $article[0],
                'content' => $article[1],
                'author' => $admin->id,
                'date_publication' => $article[2],
                'is_global' => $article[3],
                'status_id' => $article[4],
                'url_header_photo' => $article[5]
            ]);

            if($article[3] == 0){
                $last_article_id = $this->db->getLastInsertID();
                $region = \common\models\ar\Region::findOne(['symbol' => 'pl']);
                $this->insert('article_region', [
                    'article_id' => $last_article_id,
                    'region_id' => $region->id
                ]);
            }
        }

    }

    public function safeDown() {

        $example_articles_titles = [
                'Politechnika Poznańska - jedna z lepszych uczelni techniczynch w Polsce',
                'Politechnika Poznańska - UCZELNIA EUROPEJSKA',
                'Politechnika Poznańska - NAUKA'
        ];

        foreach($example_articles_titles as $title){
            \common\models\ar\Article::deleteAll(['title' => $title]);
        }
        
    }
}
