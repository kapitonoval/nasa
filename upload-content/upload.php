<?php
    include_once './mysqli.php';

/**
 * Class UpdateContent
 *
 * @author Alexey Kapitonov
 */
class UpdateContent
{
    public $xmlUrl = 'https://www.nasa.gov/rss/dyn/lg_image_of_the_day.rss';
    public $xmlLocal  = './nasa.xml';
    public $imgPath = './img/';
    function constructor()
    {
        $this->db();

//        $this->init();
    }


    /**
     * @param $src
     * @return string
     */
    public function saveImage($src){

        $fileName = basename($src);
//        echo $fileName.'<br>';
        if (!file_exists($this->imgPath.$fileName)) {
                echo '6546 - ';
            $img = file_get_contents($src);
            file_put_contents($this->imgPath . $fileName, $img);
        }

        return $fileName;
    }

    /**
     * get content
     *
     * @return arry
     */
    public function getContents()
    {
        $this->db();
        $query = "SELECT * FROM `tbl_post` ORDER BY `id` DESC ";
        $result = $this->mysqli->query($query) or die($this->mysqli->error);
        $cont = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $cont[] = $row;
            }
        }
        return $cont;
    }

    /**
     * @param $array
     */
    public function insertRow($array)
    {
        $this->db();
        $query = "INSERT INTO `tbl_post` SET";
        $query .= " `title`='".addslashes($array['title'])."' ";
        $query .= ", `pub_date`='".$array['pub_date']."' ";
        $query .= ", `description`='".addslashes($array['description'])."' ";
        $query .= ", `img`  = '".$array['img']."' ";
        $query .= ", `link_to_nasa`='".$array['link_to_nasa']."' ";

        echo $query.'<br><br>';
        $result = $this->mysqli->query($query) or die($this->mysqli->error);
    }

    /**
     * save file xml
     */
    public function saveFlileXml()
    {
        $xml = file_get_contents($this->xmlUrl);
        file_put_contents($this->xmlLocal , $xml);
    }

    /**
     * check for column value
     *
     * @param $val
     * @param string $column
     * @return bool
     */
    private function checkTitle($val, $column = 'title'){
        $this->db();
        $query = "SELECT count(*) as `count` FROM `tbl_post` WHERE `".$column."` = '".addslashes($val)."'  ";
        $result = $this->mysqli->query($query) or die($this->mysqli->error);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if ($row['count'] > 0) return true;
            }
        }

        return false;
    }
    /**
     * parce
     */
    public function parseRss()
    {
        // save the file xml
        $this->saveFlileXml();

        $xmlContent = simplexml_load_file($this->xmlLocal);

//        print_r($xmlContent);
        foreach ($xmlContent->channel->item as $key => $item) {


            if (!$this->checkTitle( $item->title ))
            {
                $attr = $item->enclosure->attributes();


                $array['title']         = $item->title;
                $array['description']   = $item->description;
                $array['pub_date']      = date('Y-m-d H:i:s',strtotime($item->pubDate));
                $array['img']           = $this->saveImage($attr['url']);
                $array['link_to_nasa']  = $item->link;

//                print_r($array);
                $this->insertRow($array);

            }
        }
    }


    // подключение к базе
    public function db(){
        if(!isset($this->mysqli)){
            include_once __DIR__.'./mysqli.php';
            $db = Database::getInstance();
            $this->mysqli = $db->getConnection();
        }
        return $this->mysqli;
    }
}

$myParser = new UpdateContent();
?>
<style>
    html, body{
        font-family: Arial;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.7);
    }
    #nasaTbl{
        width: 1000px;
        position: absolute;
        left: 50%;
        margin-left: -500px;
    }
    #nasaTbl tr td{
        padding: 15px;
    }
    #nasaTbl tr td img{
        width: 150px;
    }
</style>
<table id="nasaTbl">
    <?php
    foreach ($myParser->getContents() as $value )
    {
       ?>
        <tr>
    <?php
        foreach ($value as $key => $val)
        {
            ?><td><?php
            switch ($key){
                case 'img':
                    echo  '<img src="./img/'.$val.'">';
                    break;

                case 'link_to_nasa':
                    continue;
                    break;
                default:
                    echo $val;
                    break;
            }


            ?></td><?php
        }
    ?></tr><?php
    }

    $myParser->parseRss();
?>
</table>
