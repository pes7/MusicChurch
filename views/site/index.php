<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

function cutText($text,$i) : string{
       $t = mb_substr( $text , 0, $i );
       if(strlen($text)>$i)
        $t.="...";
       return $t;
}
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead"><?php
            $text = $bible[0]->text;
            $url = $bible[0]->url;
            echo("$text ($url)");
        ?></p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
                foreach ($news as $mode) {
                    echo("<div class='col-lg-4'>
                            <h2>$mode->caption</h2>
                            <p>".cutText($mode->text,200)."</p>
                            <p>$mode->date</p>
                            <p><a class='btn btn-default' href='?news=$mode->id'>ReadMore</a></p>
                          </div>");
                }
            ?>
        </div>

    </div>
</div>
