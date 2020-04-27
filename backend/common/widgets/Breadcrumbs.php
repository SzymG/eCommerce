<?php
namespace common\widgets;

use yii\helpers\Html;
use yii\widgets\Breadcrumbs as OriginalBreadcrumbs;
use Yii;

class Breadcrumbs extends OriginalBreadcrumbs {
    public $outerTag = 'nav';
    public $outerTagOptions = ['aria-label' => 'breadcrumb'];

    public $tag = 'ol';
    public $itemTemplate = '<li class="breadcrumb-item">{link}</li>';
    public $activeItemTemplate = '<li class="breadcrumb-item active" aria-current="page">{link}</li>';

    public function run() {
        $this->prepareLinks();
        echo Html::beginTag($this->outerTag, $this->outerTagOptions);
        parent::run();
        echo Html::endTag($this->outerTag);
    }

    private function prepareLinks() {
        foreach ($this->links as $key => $link) {
            if(isset($link['url'])) {
                $link['class'] = 'link-main';
                $this->links[$key] = $link;
            }
        }
    }
}
