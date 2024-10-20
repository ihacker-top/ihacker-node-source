<?php

namespace app\rss\controller;

use voku\helper\HtmlDomParser;

class Jianshu {

    private $htmlObj;

    public function data () {

        header("Access-Control-Allow-Origin: *");
        $update = $this->getUpdateTime();
        
        $result = ['code' => 0, 'message' => '成功', 'update' => '0000-00-00 00:00:00', 'body' => []];

        try {

            $this->htmlObj = new \app\rss\service\Html();

            if (strtotime($update) + 3600 < strtotime(date('Y-m-d H:i:s', time()))) {

                $dataList = [];

                $jsonStr = $this->htmlObj->getJsonByUrl('https://www.jianshu.com/users/8666e0fc2870/collections_and_notebooks?slug=8666e0fc2870');
                $jsonData = json_decode($jsonStr, true);

                foreach ($jsonData['notebooks'] as $nb) {
                    $insertData = ['category' => $nb['name']];
                    $url = 'https://www.jianshu.com/nb/' . $nb['id'];
                    $htmlStr = $this->htmlObj->getHtmlByUrl($url);
                    $dom = HtmlDomParser::str_get_html($htmlStr);
                    $liList = $dom->find("#list-container li");
                    foreach ($liList as $li) {
                        $insertData['title'] = $li->findOne(".title")->text;
                        $insertData['href'] = $li->findOne(".title")->attr['href'];
                        $insertData['create_time'] =  date('Y-m-d H:i:s', strtotime($li->findOne(".time")->attr['data-shared-at']));
                        $dataList[] = $insertData;
                    }
                }

                if (!empty($dataList)) {
                    $update = date('Y-m-d H:i:s', time());
                    $this->delData();
                    $this->saveData($dataList);
                    $this->setUpdateTime($update);
                }
            }
        }catch (\Exception $e) {
            $result['code'] = -1;
            $result['message'] = $e->getMessage();
        }

        $result['update'] = $update;
        $result['body'] = $this->getNewList();
        return json($result);
    }

    private function getUpdateTime () {
        $result = Db('rss_conf')->where(['id' => 1])->find();
        return $result['update'];
    }

    private function setUpdateTime ($update) {
        Db('rss_conf')->data(['update' => $update])->where(['id' => 1])->update();
    }

    private function saveData ($dataList) {
        foreach ($dataList as $data) {

            $insertData = [];
            $insertData['title'] = $data['title'];
            $insertData['category'] = $data['category'];
            $insertData['href'] = $data['href'];
            $insertData['create_time'] = $data['create_time'];
            Db('rss_jsdata')->data($data)->insert();
        }
    }

    private function delData () {
        return Db()->query('truncate table rss_jsdata;');
    }

    private function getNewList () {
        $result = Db('rss_jsdata')->field(['*','DATE_FORMAT(create_time, "%Y-%m-%d") as create_time'])->order('create_time desc')->limit('20')->select();
        foreach ($result as $key => $item) {
            $result[$key]['href'] = 'https://www.jianshu.com' . $item['href'];
        }
        return $result;
    }
}
