<?php

use console\components\Migration;
use yii\db\Query;

class m191204_121704_insert_new_keywords extends Migration {

    private $keywords = [
        ['pl'=>'Student', 'en'=>'Alumni', 'symbol'=>'alumni'],
        ['pl'=>'Absolwent', 'en'=>'Graduates', 'symbol'=>'graduates'],
        ['pl'=>'Polska', 'en'=>'Poland', 'symbol'=>'poland'],
        ['pl'=>'PP', 'en'=>'PUT', 'symbol'=>'put'],
        ['pl'=>'Architektura', 'en'=>'Architecture', 'symbol'=>'architecture'],
        ['pl'=>'Technologia chemiczna', 'en'=>'Chemicaltechnology', 'symbol'=>'chemicaltechnology'],
        ['pl'=>'Automatyka i robotyka', 'en'=>'Automatic Control and Robotics', 'symbol'=>'automatic_control_and_robotics'],
        ['pl'=>'Kompozyty i nanomateriały', 'en'=>'Composites and Nanomaterials', 'symbol'=>'composites_and_nanomaterials'],
        ['pl'=>'Konstrukcje budowlane', 'en'=>'Structural Engineering', 'symbol'=>'structural_engineering'],
        ['pl'=>'Inżynieria przedsięwzięć budowlanych', 'en'=>'Construction Engineering Management', 'symbol'=>'construction_engineering_management'],
        ['pl'=>'Budownictwo', 'en'=>'Civil Engineering', 'symbol'=>'civil_engineering'],
        ['pl'=>'Informatyka', 'en'=>'Computing', 'symbol'=>'computing'],
        ['pl'=>'Programowanie', 'en'=>'Software engineering', 'symbol'=>'software_engineering'],
        ['pl'=>'Elektronika i telekomunikacja', 'en'=>'Electronics and Telecommunications', 'symbol'=>'electronics_and_telecommunications'],
        ['pl'=>'Inżynieria zarządzania', 'en'=>'Engineering Management', 'symbol'=>'engineering_management'],
        ['pl'=>'Inżynieria transportu', 'en'=>'Transport Engineering', 'symbol'=>'transport_engineering'],
        ['pl'=>'Inżynieria produktu', 'en'=>'Product Engineering', 'symbol'=>'product_engineering'],
        ['pl'=>'Technologie gazowe i odnawialne źródła energii', 'en'=>'Gas Technology and Renewable Energy', 'symbol'=>'gas_technology_and_renewable_energy'],
        ['pl'=>'Mechatronika', 'en'=>'Mechatronics', 'symbol'=>'mechatronics'],
        ['pl'=>'Logistyka', 'en'=>'Logistics', 'symbol'=>'logistics'],
        ['pl'=>'Sztuczna inteligencja', 'en'=>'Artificial Intelligence', 'symbol'=>'artificial_intelligence'],
        ['pl'=>'Budownictwo zrównoważone', 'en'=>'Sustainable Building Engineering', 'symbol'=>'sustainable_building_engineering'],
        ['pl'=>'Mechanika i budowa maszyn', 'en'=>'Mechanical Engineering', 'symbol'=>'mechanical_engineering'],
        ['pl'=>'Zarządzanie i inżynieria produkcji', 'en'=>'Management and production engineering', 'symbol'=>'management_and_production_engineering'],
        ['pl'=>'Inżynieria biomedyczna', 'en'=>'Biomedical engineering', 'symbol'=>'biomedical_engineering'],
        ['pl'=>'Fizyka techniczna', 'en'=>'Technical physics', 'symbol'=>'technical_physics'],
        ['pl'=>'Bioinformatyka', 'en'=>'Bioinformatics', 'symbol'=>'bioinformatics'],
        ['pl'=>'Studenci zagraniczni', 'en'=>'International students', 'symbol'=>'international_students'],
        ['pl'=>'Studia magisterskie', 'en'=>'Master studies', 'symbol'=>'master_studies'],
        ['pl'=>'Studia inżynierskie', 'en'=>'Bachelor studies', 'symbol'=>'bachelor_studies'],
        ['pl'=>'Studia doktoranckie', 'en'=>'PhD', 'symbol'=>'phd'],
        ['pl'=>'Kandydat', 'en'=>'Candidate', 'symbol'=>'candidate'],
        ['pl'=>'Wykład', 'en'=>'Lecture', 'symbol'=>'lecture'],
        ['pl'=>'Warsztat', 'en'=>'Workshop', 'symbol'=>'workshop'],
        ['pl'=>'Praktyki', 'en'=>'Training', 'symbol'=>'training'],
        ['pl'=>'Konferencja', 'en'=>'Conference', 'symbol'=>'conference'],
    ];

    public function safeUp() {
        $polishId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        $englishId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);

        foreach($this->keywords as $keyword) {
            $this->insert('keyword', ['symbol' => $keyword['symbol']]);
            $keywordId = $this->db->lastInsertID;

            $this->insert('keyword_translation', [
                'keyword_id' => $keywordId,
                'language_id' => $polishId,
                'name' => $keyword['pl']
            ]);

            $this->insert('keyword_translation', [
                'keyword_id' => $keywordId,
                'language_id' => $englishId,
                'name' => $keyword['en']
            ]);
        }
    }

    public function safeDown() {
        
    }
}
