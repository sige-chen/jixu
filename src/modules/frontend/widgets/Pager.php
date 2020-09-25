<?php
namespace app\modules\frontend\widgets;
use yii\db\ActiveQuery;
use yii\helpers\Url;
class Pager extends \yii\bootstrap\Widget {
    /**
     * @var ActiveQuery
     */
    public $query = null;
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Widget::run()
     */
    public function run() {
        $totalCount = $this->query->count();
        $pageSize = $this->query->limit;
        $pageCount = 0;
        
        if (0 === ($totalCount%$pageSize)) {
            $pageCount = $totalCount / $pageSize;
        } else {
            $pageCount = ($totalCount - ($totalCount%$pageSize)) / $pageSize + 1;
        }
        
        $curPage = $this->query->offset / $pageSize + 1;
        
        $html = [];
        $html[] = '<div class="pages">';
        $html[] = sprintf('<div class="txt">共有%d条内容，共%d页，当前第%d页&nbsp;&nbsp;&nbsp;</div>', $totalCount, $pageCount, $curPage);
        $html[] = '<ul class="list">';
        if ( 1 !== $curPage ) {
            $html[] = sprintf('<li class="pages-next"><a href="%s">首页</a></li>', Url::current(['page'=>1]));
        }
        if ( 1 < $curPage ) {
            $html[] = sprintf('<li><a href="%s">上一页</a></li>', Url::current(['page'=>$curPage-1]));
        }
        if ( $curPage < $pageCount ) {
            $html[] = sprintf('<li><a href="%s">下一页</a></li>', Url::current(['page'=>$curPage+1]));
        }
        if ( $curPage < $pageCount ) {
            $html[] = sprintf('<li class="pages-next"><a href="%s">尾页</a></li>', Url::current(['page'=>$pageCount]));
        }
        $html[] = '</ul>';
        $html[] = '</div>';
        return implode('', $html);
    }
}