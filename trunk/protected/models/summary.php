<?php

class Summary extends CFormModel
{
        /**
         * 这个类为整站提供一个数据摘要服务，主要供站点汇总页使用
         */

        /**
         * @param <int> $limit 设置返回多少条站点推荐会员
         * @return <objects> 返回limit指定数量的站点推荐的会员
         */
        public function getTopSite($limit=6){
                return Users::model()->findAll('top_site=1 AND userStatus=1 AND realname IS NOT NULL ORDER BY lastLoginDate DESC LIMIT '.$limit);
        }
        /**
         * @param <int> $limit 设置返回多少条行业推荐会员
         * @return <objects> 返回limit指定数量的行业推荐的会员
         */
        public function getTopTrade($limit=6){
                return Users::model()->findAll('top_trade=1 AND userStatus=1 AND realname IS NOT NULL ORDER BY lastLoginDate DESC LIMIT '.$limit);
        }
        /**
         * @param <int> $id 全局分类代码
         * @param <int> $Limit 获取多少条
         * @return <objects> 返回limit指定数量的全局分类文章
         */
        public function getByGCate ($id, $limit=6){
                if(intval($id))
                        return Articles::model()->findAll('gacStatus=1 AND status=1 AND globalArticlesCategoriesId=:id ORDER BY updateDate DESC LIMIT :limit', array(':id'=>$id,':limit'=>$limit));
                return NULL;
        }
}