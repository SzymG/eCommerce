<?php

use console\components\Migration;
use yii\db\Query;

class m191217_075812_insert_data_to_information_page_tables extends Migration {

    public function safeUp() {
        $enId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);;
        $plId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);

        $this->insert('information_page', [
            'symbol' => 'about_university',
        ]);

        $informationPageId = $this->db->getLastInsertID();
        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $plId,
            'name' => 'Politechnika Poznańska (PP) od 100 lat zapewnia wyższe wykształcenie techniczne. Rozpoczęła swoją działalność w 1919 r. jako Państwowa Wyższa Szkoła Budowy Maszyn. Misją uczelni jest kształcenie wysoko wykwalifikowanych specjalistów oraz umożliwianie wprowadzania nowych innowacji technologicznych i światowej klasy badań naukowych. PP zapewnia edukację około 16 000 studentów na 9 wydziałach, 29 kierunkach i ponad stu specjalnościach. Ponad 1319 nauczycieli akademickich nadzoruje proces kształcenia i zapewnia studentom wsparcie. Bogata oferta edukacyjna uczelni spełnia wymagania pracodawców zarówno w Polsce, jak i za granicą. Uczelnia oferuje innowacyjne studia dualne łączące wiedzę teoretyczną i jej praktyczne zastosowanie w praktykach w wiodących firmach w regionie, takich jak Volkswagen Poznań, Solaris Bus &amp; Coach S. A., Phoenix Contact Wielkopolska, STER. Lista partnerów PUT zawiera również: Samsung Electronics, Amica, Man Bus, HCP-Poznań, Luvena, GlaxoSmithKlinePharmaceucals S. A.), Dalkia, Budimex, Skanska, MTP-Poznań, BZ WBK - Group Santander i wiele innych. Podpisano specjalne umowy z uniwersytetami we Francji - Uniwersytetem Technicznym w Lille i Kijowie - na następujące kierunki studiów: Zarządzanie korporacyjne, inżynieria mechaniczna i inżynieria biomedyczna, które umożliwiają studentom uzyskanie dwóch stopni naukowych po ukończeniu wspólnego programu studiów. W listopadzie 2016 r. na PP otwarto pierwszą w Polsce Akademię Huawei. Zbudowano nowoczesne laboratorium, w którym studenci mogą studiować nowoczesne technologie Huawei. W ostatnim czasie powstało polsko-chińskie Centrum Badawcze Nowego Jedwabnego Szlaku, którego celem jest umożliwienie transferu nauki, edukacji i kultury pomiędzy tymi dwoma krajami. <br><br> PP jest ważnym ośrodkiem badań naukowych. W styczniu 2017 roku PP jako jedyna polska uczelnia wyższa otrzymała stypendium Horizon 2020 Marie-Skłodowska-Curie Global Fellowships. Uczelnia posiada uprawnienia do nadawania stopni doktora w 19 dyscyplinach oraz stopni habilitacyjnych w 14 dyscyplinach - 494 studentów realizuje studia doktoranckie. PP jest dumna, że ma 3 laureatów Fundacji na rzecz Polskiej Nagrody Naukowej, często określanej mianem Polskiej Nagrody Nobla oraz naukowców zajmujących najwyższe stanowiska w Polskiej Akademii Nauk i członków wielu międzynarodowych towarzystw naukowych. PP została również uhonorowana nagrodą ElsevierResearchImpactLeadersAward for MedicalSciences przyznawaną instytucjom szkolnictwa wyższego, których wkład wzmocnił pozycję Polski w świecie międzynarodowej nauki. W najnowszym rankingu Hiszpańskiej Krajowej Rady Badań Naukowych, PP za liczbę cytowań zajęła trzecie miejsce wśród innych polskich uczelni. W ramach wspólnego przedsięwzięcia PP i Instytutu Chemii Bioorganicznej Polskiej Akademii Nauk powołano Europejskie Centrum Bioinformatyki i Genomiki. Celem projektu jest rozwój badań strategicznych i zwiększenie transferu z sektora B+R do gospodarki. W 2018 r. uczelnia aktywnie uczestniczyła w 181 projektach badawczych, a znaczną część budżetu uczelni przeznaczono na badania. <br></br> Według najnowszej listy Center for World University Rankings na lata 2019-2020, Politechnika Poznańska znalazła się na 1446. miejscu spośród dwudziestu tysięcy uniwersytetów na całym świecie. Dzięki temu Uczelnia znajduje się wśród 7,3 procent najlepszych uczelni, co jest znaczącym osiągnięciem. Natomiast w najnowszym Academic Ranking of World Universities (zwanym Rankingiem Szanghajskim) Politechnika Poznańska została sklasyfikowana wśród 500 najlepszych uczelni na świecie w dwóch dyscyplinach: informatyka (ang. Computer Science & Engineering) oraz inżynieria mechaniczna (ang. Mechanical Engineering). Jeśli chodzi o informatykę, to w tegorocznym rankingu znalazły się tylko dwie polskie uczelnie, PP i Uniwersytet Warszawski, obie sklasyfikowane na pozycjach 401-500. W dyscyplinie \"inżynieria mechaniczna\" na 400 sklasyfikowanych uczelni znalazło się aż 7 z Polski, w tym PP na pozycji w czwartej setce. <br><br> PP posiada prawie 460 aktywnych umów Erasmus+, które umożliwiają 1 129 studentom pobyt za granicą. Posiada również ponad 190 umów z instytucjami edukacyjnymi na całym świecie na wspólne badania oraz wymianę studentów i kadry akademickiej. PP oferuje stypendia dla najlepszych międzynarodowych studentów odbywających płatne kursy. Od 2014 roku istnieje Centrum Lotnictwa z nowoczesnym symulatorem lotu; PP dysponuje flotą dwóch statków powietrznych. Obecnie studenci PP mogą być kształceni na dwóch kierunkach: Lotnictwo i kosmonautyka. Został on założony, aby zapewnić studentom wgląd w specjalizacje związane z lotnictwem i szkolenia na pokładzie. <br><br> Uczelnia słynie z wysokiej jakości nauczania i przyjaznego środowiska studiowania. Jest gospodarzem wielu grup badawczych i organizacji studenckich umożliwiających studentom realizację ich zawodowych i osobistych zainteresowań i pasji. W roku akademickim 2019/2020 obchodzono Inaugurację Szkoły Doktorskiej Politechniki Poznańskiej. Ponadto Wydział Inżynierii Zarządzania, zdobył pierwsze miejsce w Rankingu Kierunków Studiów LOGISTYKA przygotowanym w ramach Jubileuszowego 20. Rankingu Szkół Wyższych Perspektywy 2019. <br><br> Studenci PP mogą dołączyć do jednej z ponad 80 grup naukowych, istnieje studencka stacja radiowa Radio Afera, studencka stacja telewizyjna Spacja TV, chór uniwersytecki Volantes Soni i wiele innych organizacji. PP ma 36 klubów sportowych. Centrum Sportu Politechniki Poznańskiej posiada zaplecze do gry w tenisa, kręgle, spinningu, wiosłowania, squasha oraz siłownie. Życie artystyczne jest również obecne i kwitnące na uczelni w postaci PoligrodzianieFolk Dance Ensemble i mieszanym chórem kameralnym Volantes Soni. Studenci PP odnoszą duże sukcesy na arenie międzynarodowej. Przykładem jest debiut zespołu PUTrain w zawodach Railway Challenge. PUTrain to studencki zespół Politechniki Poznańskiej, który zbudował lokomotywę w skali 1:5,5 i wystartował w zawodach Railway Challenge w Wielkiej Brytanii. Debiut studentów z zespołu PUTrain przyniósł specjalne wyróżnienie od sędziów - za oryginalny design, zastosowane materiały oraz innowacje, a także elegancję i estetykę zaprezentowanej lokomotywy.Zespół studentów PUT Motorsport zaprezentował podczas zawodów FSAE Italy odbywających się w 2019 r. na torze Autodromo Riccardo Paletti w Varano swoją piątą konstrukcję spalinową – Rusałkę. Dzięki całorocznej pracy, zaangażowaniu i poświęceniu członków zespołu, studenci po raz kolejny znaleźli się w czołówce - w klasyfikacji ogólnej zawodów zajęli 10 miejsce.Zespół projektowy złożony ze studentów i absolwentów Wydziału Architektury zajął 1. miejsce w konkursie na koncepcję punktu widokowego na budowę Muzeum Sztuki Nowoczesnej w Warszawie. Pawilon zostanie zrealizowany wiosną 2020 roku. Dwójka studentów Wydziału Architektury zajęła II miejsce w prestiżowym międzynarodowym konkursie Evolo 2019 na innowacyjne wieżowce przyszłości.Ponadto aplikacja The Great BloomTheory stworzona przez zespół studentów z Politechniki Poznańskiej dotycząca przewidywania szkodliwego zakwitu alg oraz skutecznych metod im zapobiegającym zakwalifikowała się do kolejnego etapu konkursu NASA Space Apps Challenge! Jest to międzynarodowy maraton pomysłów, gdzie uczestnicy w ciągu 48 godzin musieli stworzyć projekt naukowej aplikacji. Udział w nim wzięło prawie 30 tysięcy ludzi. <br><br> Również w 2019 roku została podpisana umowa spółki MAB Robotics sp. z o.o., której właścicielami są studenci PP oraz - poprzez spółkę celową Politechnika Innowacje sp. o.o. - Politechnika Poznańska. <br><br> W konkursie zorganizowanym przez Polskie Stowarzyszenie Sztucznej Inteligencji na najlepszą pracę doktorską ze Sztucznej Inteligencji – edycja 2018 całą pulę nagród (łącznie 1 nagród i wyróżnień) otrzymali naukowcy z Politechniki Poznańskiej - co zdarzyło się pierwszy raz w tym konkursie. <br><br> Naukowcy zatrudnieni na Politechnice Poznańskiej są rozpoznawani i doceniani przez liczne naukowe międzynarodowe organizacje. Na przykład prof. dr hab. inż. Roman Słowiński, jako jedyny Polak, uhonorowany został w tym roku tytułem Fellow, nadawanym przez Amerykańskie Towarzystwo Badań Operacyjnych INFORMS (The Institute for Operations Research and the Management Sciences). Prof. dr hab. inż. Jerzy Merkisz został nominowany do SAE Fellow Grade of Membership. Ten najwyższy stopień członkostwa jest uznaniem dla długoterminowych członków, którzy wywarli znaczący wpływ na technologie mobilności społeczeństwa poprzez przywództwo, badania i innowacje. <br><br> W 2019 r. obchodzono 100-lecie szkolnictwa wyższego technicznego w Poznaniu. Jubileusz ten jest nierozerwalnie związany z utworzeniem szkoły, której tradycje naukowo-badawcze kontynuuje Politechnika Poznańska (PP). <br><br><br> <b>Historia Politechniki Poznańskiej</b> <br><br><i>1919</i> Swoją działalność rozpoczyna jednowydziałowa Państwowa Wyższa Szkoła Budowy Maszyn, powołana z inicjatywy Naczelnej Rady Ludowej. Jej budynek mieści się w obecnym rektoracie Politechniki Poznańskiej na Wildzie przy placu Marii Skłodowskiej-Curie. <br><i>1929</i> Utworzony zostaje nowy Wydział Elektryczny, a dotychczasowa nazwa uczelni jest rozszerzona do postaci Państwowej Wyższej Szkoły Budowy Maszyn i Elektrotechniki. <br><i>1939</i> Wybuch II wojny światowej przekreśliła nadzieje na przekształcenie szkoły w uczelnię techniczną o statusie politechniki, które planowano na 1940. <br><i>1945</i> Wraz z zakończeniem II wojny światowej uczelnia zyskuje nazwę Państwowej Szkoły Inżynierskiej. Uczelnia od tej pory poszerza swoją działalność o kolejne wydziały, między innymi wydział Budownictwa. Do 1955 działała jako trzyletnia wyższa szkoła typu półakademickiego. <br><i>1950-1954</i> Uruchomienie wydziału Architektury. <br><i>1955</i> Szkołę Inżynierska zostaje przemianowana na Politechnikę Poznańską. <br><i>1965-1975</i> Wybudowanie dwóch nowych gmachów w kampusie Piotrowo: Wydziału Budowy Maszyn i Wydziału Elektrycznego. <br><i>1975</i> Utworzony zostaje wydział Fizyki Technicznej. <br><i>1999</i> Przywrócony zostaje wydział Architektury, a wydział Budownictwa zostaje przemianowany na wydział Budownictwa i Inżynierii Środowiska. <br><i>1999-2004</i> Pierwszy etap budowy nowego gmachu Centrum Wykładowego. <br><i>2006-2010</i> W 2006 powstaje nowy budynek oraz wydział Elektroniki i Telekomunikacji, mieszczący się poza terenem kampusu Piotrowo na ulicy Polanka. W tym czasie trwa również drugi etap budowy nowego gmachu Biblioteki Technicznej. W 2010 zostaje zakończona budowa obiektu Biblioteki Technicznej i Centrum Wykładowego. <br><i>2009</i> Kampus Piotrowo zostaje przemianowany na kampus Warta. <br><i>2011</i> Na kampusie Piotrowo powstaje nowy budynek naukowo-dydaktyczny – Centrum Mechatroniki, Biomechaniki i Nanoinżynierii. <br><i>2014</i> Do użytku zostaje oddany nowy budynek Wydziału Technologii Chemicznej. <br><i>2015</i> Powstaje nowa hala sportowa na kampusie Warta. <br><br> Więcej informacji: https://100lat.put.poznan.pl <br><br> Projekt finansowany przez Narodową Agencję Wymiany Akademickiej w ramach Programu International Alumni'
        ]);

        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $enId,
            'name' => 'Poznan University of Technology (PUT) has been providing higher technical education for 100 years. It started in 1919 as Higher State School of Mechanical Engineering. The university’s mission is to educate tomorrow’s highly-skilled workforce and enable new technological innovations and world-class research. PUT provides education to about 16,000 students across 10 faculties, 29 fields of study and over a hundred specializations. Over 1,319 academic staff oversee the process of education and provide students with their support. The rich educational offer of the university meets the requirements of employers both in Poland and abroad. The university offers innovative dual studies programmes combining theoretical knowledge and its practical application in apprenticeships in leading companies across the region as Volkswagen Poznań, Solaris Bus & Coach S. A., Phoenix Contact Wielkopolska, STER. The list of PUT partners includes also: Samsung Electronics, Amica, Man Bus, HCP-Poznań, Luvena, GlaxoSmithKline Pharmaceuticals S. A.), Dalkia, Budimex, Skanska, MTP-Poznań, BZ WBK – Group Santander, and many others. Special agreements have been signed with universities in France – Lille and KyivTechnicalUniversity- for the following fields of study: Corporate Management; Mechanical Engineering, and Biomedical Engineering which enable students to obtain two degrees upon completing a joint programme of study. In November 2016 aHuaweiAcademy was opened at PUT, first of its kind in Poland. A modern laboratory was built, where students can study modern Huawei technologies. Recently a Polish and Chinese Joint Research Centre of New Silk Route was founded to enable the transfer of science, education and culture between the two countries. <br><br> PUT is an important scientific research hub. In January of 2017, PUT was the only Polish institution of higher education to be awarded this year Horizon 2020 Marie-Skłodowska-Curie Global Fellowships grant. The university has been authorized to confer doctoral degrees in 19 disciplines and habilitation degrees in 14 disciplines - 494 students are pursuing Ph.Dprogrammes. PUT is proud to have 3 laureates of Foundation for Polish Science Prize, often referred to as the Polish Nobel Prize and scientists holding top positions in PolishAcademy of Sciences and members of numerous international scientific societies. PUT was also honored with Elsevier Research Impact Leaders Award for Medical Sciences given to institutions of higher education whose contributions have strengthened the position of Poland in the world of international science. In the most recent Spanish National Research Council ranking, PUT achieved the third place among other Polish universities for number of citations. As a joint endeavor of PUT and the Institute of Bioorganic Chemistry of Polish Academy of Sciences, European Centre for Bioinformatics and Genomics was established. The objective of the project is to develop strategic research and increasing the transfer from R&D to the economy. In 2018 the university was actively involved in 181 research projects and a significant part of the university budget was allocated for research. <br><br> According to the latest list of the Center for World University Rankings for 2019/2020, the Poznan University of Technology was ranked 1446th among twenty thousand universities worldwide. As a result, the University is among the 7.3% of the best universities, which is a significant achievement.In the latest Academic Ranking of World Universities (called Shanghai Ranking) the Poznan University of Technology has been classified among the 500 best universities in the world in two disciplines:IT (Computer Science & Engineering) and Mechanical Engineering.As far as IT is concerned, this year\'s ranking includes only two Polish universities, PUT and the University of Warsaw, both classified on the positions 401-500. In the discipline of “mechanical engineering\" out of 400 classified universities there were as many as 7 from Poland, including PUT on the position in the fourth hundred. <br><br> PUT has nearly 460 active Erasmus+ agreements that enable 1,129 students a stay abroad. It also has over 190 agreements with educational institution worldwide for joint research and student and academic staff exchange. PUT offers scholarships for the best international students doing payable courses. <br><br> Since 2014 a Centre of Aviation has been in existence with a modern flight simulator; PUT has a fleet of two air craft. At present PUT students can be educated in two fields: Aviation and Cosmonautics. It was founded to provide students with insight into aviation-related specializations and on board training. <br><br> The university is renowned for its high-quality teaching and friendly studying environment. It is host to numerous research groups and student organizations enabling its students to pursue their professional and personal interests and passions. In the academic year 2019/2020 was celebrated the Inauguration of the DoctoralSchool of the Poznan University of Technology. In addition, the Faculty of Management Engineering won first place in the Ranking of LOGISTics Studies Degrees prepared as part of the Jubilee 20th Ranking of Universities of Higher Education Perspectives 2019. <br><br> PUT students can join one of over 80 science groups, there is a student radio station Radio Afera, a student TV station Spacja TV, university choir Volantes Soni, and many other organizations. PUT has 36 sporting clubs. The Sports Centre at PUT has facilities for tennis, bowling, spinning, in door rowing, squash as well as gyms. The artistic life also present and thriving at the university with Poligrodzianie Folk Dance Ensemble and Volantes Soni mixed chamber choir.PUT students are highly successful in the international arena. For example, debut of the PUTrain team in the Railway Challenge competition. PUTrain is a student team from Poznan University of Technology, which built a 1:5. 5 scale locomotive and took part in Railway Challenge competition in Great Britain. The debut of the PUTrain students brought a special distinction from the judges - for the original design, materials used and innovations, as well as for the elegance and aesthetics of the presented locomotive.A team of PUT Motorsport students presented their fifth combustion construction at the 2019 FSAE Italy competition at the Autodromo Riccardo Paletti in Varano - the Rusalka. Thanks to the year-round work, commitment and dedication of the team members, the students once again found themselves in the lead - in the general classification of the competition they took 10th place.The design team consisting of students and graduates of the Faculty of Architecture was ranked 1st in the competition for the concept of a viewing point for the construction of the Museum of Modern Art in Warsaw. The pavilion will be built in the spring of 2020. Two students of the Faculty of Architecture, took second place in the prestigious international Evolo 2019 competition for innovative skyscrapers of the future. What is more, the application The Great Bloom Theory created by team from Poznan University of Technology, on prediction of harmful algae bloom and effective methods to prevent it was qualified for the next stage of NASA Space Apps Challenge competition! It is an international marathon of ideas, where participants had to create a project of a scientific application within 48 hours. Almost 30,000 people took part in it. <br><br> Also in 2019, an agreement was signed between MAB Robotics owned by PUT students, and PUT Innowacje. This is the first spin-off of the Poznan University of Technology. <br><br> In the competition organized by the Polish Association of Artificial Intelligence for the best doctoral thesis on Artificial Intelligence - 2018 edition, the whole pool of awards (a total of 1 awards and distinctions) was given to scientists from the Poznan University of Technology - what happened for the first time in this competition. <br><br> Scientists employed at the Poznan University of Technology are recognized and appreciated by numerous scientific international organizations. For example prof. Roman Słowiński, as the only Pole, was awarded the title of Fellow this year by the American Society for Operational Research INFORMS (The Institute for Operations Research and the Management Sciences). Prof. Jerzy Merkisz was nominated to the SAE Fellow Grade of Membership. This highest membership rate is a recognition of long-term members who have had a significant impact on technologies for the mobility of society through leadership, research and innovation. <br><br> In 2019 was celebrated the 100th anniversary of the of higher technical education in Poznan. This anniversary is inextricably linked with the creation of a school whose scientific and research traditions are continued by the Poznan University of Technology (PUT). <br><br><br><b> History of the Poznan University of Technology </b><br><i>1919</i> The single-faculty State Higher School of Machine Construction, established on the initiative of the Supreme People\'s Council, started its activity. Its building is located in the present rectorate of the Poznan University of Technology in Wilda at Maria Skłodowska-Curie Square. <br><i>1929</i> A new Faculty of Electrical Engineering was established, and the existing name of the university was extended to the State Higher School of Mechanical Engineering and Electrical Engineering. <br><i> 1939</i> The outbreak of World War II crossed out the hopes of transforming the school into a technical university with the status of a university of technology, which was planned for 1940. <br><i>1945</i> With the end of the Second World War the school was renamed to the State Engineering School. Since then, the University has been expanding its activities to include other faculties, including the Faculty of Construction. Until 1955 it operated as a three-year college of semi-academic type. <br><i>1950-1954</i> Launch of the Architecture Department. <br><i>1955</i> The Engineering School was renamed the Poznan University of Technology. <br><i>1965-1975</i> Construction of two new buildings on the Piotrowo campus: the Faculty of Machine Construction and the Faculty of Electrical Engineering. <br><i>1975</i> The Faculty of Technical Physics is established. <br><i>1999</i> The Faculty of Architecture is reinstated and the Faculty of Civil Engineering is renamed the Faculty of Civil Engineering and Environmental Engineering. <br><i>1999-2004</i> First stage of construction of the new Lecture Centre building. <br><i>2006-2010</i> In 2006, a new building and a new Electronics and Telecommunications Department is being built, located outside the Piotrowo campus on Polanka Street. During this time, the second stage of the construction of the new building of the Technical Library is also in progress. The construction of the Technical Library and Lecture Centre is completed in 2010. <br><i>2009</i> The Piotrowo Campus is renamed the Warta Campus. <br><i>2011</i> A new scientific and educational building is being built on the Piotrowo campus - the Mechatronics, Biomechanics and Nanoengineering Centre. <br><i>2014</i> A new building of the Faculty of Chemical Technology is put into service. <br><i>2015</i> A new sports hall is being built on the Warta campus <br><br> More info: https://100lat.put.poznan.pl <br><br>The Project is financed by the Polish National Agency for Academic Exchange under the International Alumni Programme'
        ]);

        $this->insert('information_page', [
            'symbol' => 'contact',
        ]);

        $informationPageId = $this->db->getLastInsertID();
        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $plId,
            'name' => 'Politechnika Poznańska <br><br> Dział Informacji i Promocji <br><br> Pl. M. Skłodowskiej-Curie 5 <br><br> 60-965 Poznań <br><br> e-mail: <a href="alicja.szulc@put.poznan.pl">alicja.szulc@put.poznan.pl</a> <br><br> <a href="www.put.poznan.pl">www.put.poznan.pl</a> <br><br> facebook: <a href="facebook.com/Politechnika.Poznanska">facebook.com/Politechnika.Poznanska</a> <br><br> Projekt finansowany przez Narodową Agencję Wymiany Akademickiej w ramach Programu International Alumni'
        ]);

        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $enId,
            'name' => 'Poznan University of Technology <br><br> Department of Information and Promotion <br><br> Pl. M. Sklodowskiej-Curie 5 <br><br> 60-965 Poznan <br><br> e-mail: <a href=\"alicja.szulc@put.poznan.pl\">alicja.szulc@put.poznan.pl</a> <br><br> <a href=\"www.put.poznan.pl\">www.put.poznan.pl</a> <br><br> facebook: <a href=\"facebook.com/Politechnika.Poznanska\">facebook.com/Politechnika.Poznanska</a> <br><br>The Project is financed by the Polish National Agency for Academic Exchange under the International Alumni Programme'
        ]);

        $this->insert('information_page', [
            'symbol' => 'put_ambassadors',
        ]);

        $informationPageId = $this->db->getLastInsertID();
        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $plId,
            'name' => 'Dostarczone opisy ścieżek absolwentów <br><br> Projekt finansowany przez Narodową Agencję Wymiany Akademickiej w ramach Programu International Alumni '
        ]);

        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $enId,
            'name' => 'Descriptions of graduate paths <br><br>The Project is financed by the Polish National Agency for Academic Exchange under the International Alumni Programme'
        ]);

        $this->insert('information_page', [
            'symbol' => 'about_application',
        ]);

        $informationPageId = $this->db->getLastInsertID();
        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $plId,
            'name' => '<p><strong>Aplikacja powstała w ramach projektu International alumni. <br /> <br /> </strong></p><p><strong>Dla kogo?</strong></p><p><strong> </strong></p><ul><li><strong>Absolwenci zagraniczni PP</strong></li><li><strong>Absolwenci Polscy mieszkający poza granicami kraju </strong></li></ul><p><strong> </strong></p><p><strong>Cel aplikacji:</strong></p><p><strong> </strong></p><ul><li><strong>odnowienie kontaktu z kolegami ze studiów rozproszonymi po całym świecie;</strong></li><li><strong>bieżące informacje o wydarzeniach i inicjatywach Politechniki Poznańskiej;</strong></li><li><strong>możliwość komunikacji z absolwentami PP, którzy osiągnęli sukcesy w różnych dziedzinach; kojarzenie specjalistów –absolwentów PP pracujących w różnych miejscach świata</strong></li><li><strong>Integracja środowiska alumnów PP na cały świecie poprzez organizowanie lokalnych wydarzeń, spotkań z delegacjami z PP i alumnami mieszkającymi w danym regionie</strong></li></ul><p><strong> </strong></p><p><strong> </strong></p><p><strong>Dostępne funkcje:</strong></p><ul><li><strong>dodawania artykułów dostępnych dla wszystkich absolwentów lub tylko tych z wybranego regionu; </strong></li><li><strong>wyszukiwanie absolwentów;</strong></li><li><strong>śledzenia na bieżąco wydarzeń związanych z Politechniką Poznańską;</strong></li><li><strong>dostęp do artykułów udostępnionych przez innych użytkowników publicznie lub dla regionu wybranego przez Absolwenta;</strong></li></ul><p><strong><br /> Jak działa aplikacja?</strong></p><ul><li><strong>Absolwent rejestruje się i loguje w serwisie</strong><br /> <br /> <strong>Absolwent ma możliwość dostępu do artykułów udostępnionych przez innych użytkowników publicznie lub dla regionu wybranego przez Absolwenta. <br /> <br /> Dodatkowo, absolwent może przeglądać informacje o wydarzeniach organizowanych przez Politechnikę Poznańską.<br /> <br /> Absolwent dodaje artykuł do systemu, dostarczając tym samym informacji potencjalnie interesujących dla innych Absolwentów należących do wybranego zakresu. <br /> Artykuł, w celu udostępnienia go innym użytkownikom, musi zostać zaakceptowany przez Ambasadora (patrz poniżej).</strong> <br /> </li><li><strong>Absolwentowi, który wykazuje się zaangażowaniem w tworzeniu treści serwisu przyznawane są punkty pozwalające uzyskać określone rangi widoczne przez innych użytkowników i przekładające się na nagrody przyznawane przez Administratora. </strong></li></ul><img src="../../../assets/img/ranks_pl.png"><p><br /> <strong>Punktacja:</strong></p><ul><li>Artykuł: (pkt.2-10)</li><li>Wydarzenie: (pkt.2-10)<br /> </li></ul><p>Ilość punktów przyznaje administrator aplikacji</p><p><strong>Nagrody specjalne: </strong></p><p>Politechnika Poznańska w ramach podziękowań systematycznie nagradza Ambasadorów certyfikatami od JM Rektora oraz uczelnianymi upominkami.</p> <br><br> Projekt finansowany przez Narodową Agencję Wymiany Akademickiej w ramach Programu International Alumni'
        ]);

        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $enId,
            'name' => '<p>The application was created as part of the International alumni project.<br /> <br /> <strong>Addressed to?</strong><br /> <br /> • PUT international students<br /> • PUT Polish alumni living outside of Poland<br /> <br /> <strong>The App goals:</strong><br /> <br /> • <strong>renewing contacts with classmates from PUT from around the world;<br /> • current information about events and initiatives of the Poznan University of Technology;<br /> • the opportunity to communicate with PUT alumni who have achieved successes in various fields; associating specialists - PUT alumni working in various places around the world;<br /> • Integration of the PUT alumni community around the world by organizing local events, meetings with delegations from the PUT and alumni living in the region;</strong><br /> <br /> <strong>Available functions:<br /> </strong><br /> <strong>• adding articles available to all graduates or only those from the selected region;<br /> • graduate search;<br /> • latest news from Poznan University of Technology;<br /> • access to articles shared by other users publicly or for the region chosen by the graduate;<br /> <br /> </strong></p><p><strong>How does the application work?<br /> • A graduate registers and logs into the website</strong><br /> <br /> The graduate has the option of accessing articles shared by other users publicly or for the region chosen by the graduate.<br /> In addition, the graduate can view information about events organized by the Poznan University of Technology.<br /> The graduate adds the article to the system, thus providing information potentially interesting for other graduates in the selected area.<br /> The article must be accepted by the Ambassador (see below) to make it available to other users.<br /> <br /> • Graduates who demonstrate commitment to develop the app content are awarded points that allow them to obtain specific ranks visible by other users and awards granted by the Administrator.<br /> </p><img src="../../../assets/img/ranks_en.png"> <br /> <br /> <strong>Punctation:</strong></p><p><br /> Article: (2-10 points)<br /> Event: (2-10 points)<br /> <br /> The number of points is awarded by the application administrator.<br /> </p><p><strong>Special Awards:</strong><br /> As an apreciation, Poznan University of Technology systematically rewards Ambassadors with certificates from Rector and university gifts.</p> <br><br>The Project is financed by the Polish National Agency for Academic Exchange under the International Alumni Programme'
        ]);

        $this->insert('information_page', [
            'symbol' => 'alumni_fates',
        ]);

        $informationPageId = $this->db->getLastInsertID();
        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $plId,
            'name' => 'Kariera po Politechnice Poznańskiej jest nieunikniona. W gronie absolwentów znajdują się wybitni naukowcy i wynalazcy, prezesi międzynarodowych korporacji i właściciele firm prowadzących działalność na całym świecie, a nawet sportowcy i politycy. Warto zobaczyć, jak przebiegają kariery absolwentów Politechniki Poznańskiej - być może któraś będzie inspiracją do podjęcia własnych działań zawodowych. Grzegorz Ganowicz (Przewodniczący Rady Miasta Poznania), Zenon Małkowski (założyciel i wieloletni Prezes Małkowski-Martech S.A.), Jacek Wojciechowski (Prezes UTAL), Marek, Maciej i Michał Rucińscy (RENOMED), Łukasz Olek (twórca pierwszego polskiego e-kantoru), Katarzyna Żmudzińska (doktorantka i pilotka samolotów) <br><br> Projekt finansowany przez Narodową Agencję Wymiany Akademickiej w ramach Programu International Alumni'
        ]);

        $this->insert('information_page_translation', [
            'information_page_id' => $informationPageId,
            'language_id' => $enId,
            'name' => 'A career at the Poznan University of Technology is inevitable. The graduates include outstanding scientists and inventors, presidents of international corporations and owners of a company operating worldwide, and even athletes and politicians. It is worth seeing how the careers of Poznań University of Technology graduates are going - perhaps one of them will inspire you to activities related to your business. Grzegorz Ganowicz (Poznań City Council), Zenon Małkowski (founder and longtime president of Małkowski-Martech SA), Jacek Wojciechowski (President of UTAL), Marek, Maciej and Michał Ruciński (RENOMED), Łukasz Olek (creator of the first Polish e-currency exchange office), Katarzyna Żmudzińska (PhD student and pilot of planes) <br><br>The Project is financed by the Polish National Agency for Academic Exchange under the International Alumni Programme'
        ]);
    }

    public function safeDown() {
        $this->delete('information_page_translation');
        $this->delete('information_page');
    }
}
