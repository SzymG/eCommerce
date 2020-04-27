<?php

use console\components\Migration;

class m191025_110504_insert_example_events extends Migration {

    public function safeUp() {
        $admin = \common\models\ar\User::findOne(['email'=>'admin@absolwenci.com']);
        $example_events = [
            [
                '2019-10-24 13:11:11',
                '2019-10-25 13:11:11',
                '2019-10-26 13:11:11',
                1,
                'zZXCVBNMIKM.jpg'
            ],
            [
                '2019-10-24 13:11:11',
                '2019-10-25 13:11:11',
                '2019-10-26 13:11:11',
                1,
                'nn2019_coverphoto_828x315_0.jpg'
            ],
        ];
        $example_events_translations = [
            [
                'Konferencja Inżynierii Biomedycznej',
                'Zapraszamy na Konferencję Inżynierii Biomedycznej już w najbliższy piątek i sobotę! - 25-26 października 2019 r. Interesujące wykłady, panele dyskusyjne, projekty studenckie, firmy z branży inżynierii biomedycznej! Jedyne takie wydarzenie na Politechnice Poznańskiej! 
                Rejestracja nadal trwa - http://bioinzynieria.net/#speaker 
                Zachęcamy do przeczytania Harmonogramu',
            ],
            [
                '13.Noc Naukowców',
                '27 września 2019 r. odbyła się w Poznaniu 13.Noc Naukowców, największa impreza popularyzująca naukę w Wielkopolsce.
                Noc Naukowców to europejska impreza odbywająca się tego samego dnia w całej Europie. Tej nocy naukowcy europejskich miast odchodzą od swoich poważnych projektów, by bawić się z publicznością i stworzyć obraz naukowca nowej ery. Stają się aktorami, showmanami, przewodnikami po laboratoriach. Uczestnicy natomiast mogą wcielić się w rolę naukowców i przeprowadzać naukowe eksperymenty.
                Nadrzędnym celem imprezy jest zmiana wizerunku naukowca i zachęcenie młodzieży do podejmowania kariery naukowej, a także zbliżenie naukowców i społeczeństwa, stworzenie okazji do spotkania, poznania się i wspólnych działań, a wszystko to w atmosferze zabawy. 
                W tym roku odbywała się w 300 miastach w 24 krajach Europy i krajów sąsiednich. Wielkopolska Noc Naukowców odbyła się na Politechnice Poznańskiej, Uniwersytecie Adama Mickiewicza, Uniwersytecie Przyrodniczym, Akademii Wychowania Fizycznego, Uniwersytecie Ekonomicznym i Poznańskim Centrum Superkomputerowo-Sieciowym, w Instytucie Fizyki Molekularnej PAN oraz w Instytucie Genetyki Człowieka PAN.
                Szczegóły www.nocnaukowcow.pl
                Zapraszamy do obejrzenia fotorelacji z Politechniki Poznańskiej.
                Partnerzy Nocy Naukowców 2019',
            ]
        ];

        foreach($example_events as $index =>$event) {
            $this->insert('event', [
                'date_start' => $event[0],
                'date_end' => $event[1],
                'date_publication' => $event[2],
                'author' => $admin->id,
                'is_public' => $event[3],
                'url_header_photo' => $event[4]
            ]);

            $last_event_id = $this->db->getLastInsertID();

            $language = \common\models\ar\Language::findOne(['symbol' => 'pl']);

            $this->insert('event_translation', [
                'event_id' => $last_event_id,
                'language_id' => $language->id,
                'title' => $example_events_translations[$index][0],
                'description' => $example_events_translations[$index][1],
            ]);

            if($event[3] == 0){
                $region = \common\models\ar\Region::findOne(['symbol' => 'pl']);
                $this->insert('event_region', [
                    'event_id' => $last_event_id,
                    'region_id' => $region->id
                ]);
            }
        }

    }

    public function safeDown() {

        $example_events_titles = [
            'Konferencja Inżynierii Biomedycznej',
            '13.Noc Naukowców',
        ];

        foreach($example_events_titles as $title){
            $event_id = \common\models\ar\EventTranslation::findOne(['title' => $title])->event_id;
            \common\models\ar\EventRegion::deleteAll(['event_id' => $event_id]);
            \common\models\ar\EventTranslation::deleteAll(['event_id' => $event_id]);
            \common\models\ar\Event::deleteAll(['id' =>$event_id]);
        }
        
    }
}
