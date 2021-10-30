<?php
require("../../../secure/includes.php");
$user->redirifnotloggedin();
$html->inithtml();
$html->navbar();
?>
    <br>
    <div class="mx-auto" style="width: 95%;">
        <?php
        $html->buildnavcatalog();
        ?>
        <br>

    </div>
    <div style="margin: 0 auto 0 auto; width: 80%;" class="mx-auto">
        <?php
        $hats = $db->req_sql("SELECT * FROM tshirts ORDER BY id DESC LIMIT ".(!isset($_GET['p']) ? 0 : $_GET['p'] * 30 - 30).",30", [], true);
        if($hats == null) {die("ERR");}
        while ($hat = $hats->fetch_assoc()) {

            $html->card("/home/pages/tshirt?id=" . $hat['id'], "https://www.roblox.com/asset-thumbnail/image?assetId=" . $hat['asset'] . "&width=420&height=420&format=png", "(" . ($hat['cost'] == '-1' ? "offsale" : $hat['cost']) . ")<br>" . $hat['name']);
        }
        ?>
    </div>
    <br>
    <div style="clear: both;" class="">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="?p=<?php
                    if(isset($_GET['p'])) {
                        if($_GET['p'] <= 1) {
                            echo("1");
                        } else {
                            echo($_GET['p'] -1);
                        }
                    } else {
                        echo("1");
                    }
                    ?>">Previous</a></li>
                <?php
                $count = $db->req_sql("SELECT id FROM tshirts",[],true)->num_rows;
                $pages = (int)($count / 30) + ($count % 30 > 0 ? 1 : 0);
                for($i = 1; $i <= $pages; $i++) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?p=<?php echo($i); ?>"><?php echo($i); ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item"><a class="page-link" href="?p=<?php
                    if(isset($_GET['p'])) {
                        if($_GET['p'] == $pages) {
                            echo($pages);
                        } else {
                            echo($_GET['p'] +1);
                        }
                    } else {
                        echo(($pages < 2 ? 1 : 2));
                    }
                    ?>">Next</a></li>
            </ul>
        </nav>
    </div>
<?php
$html->buildfooter();
?>