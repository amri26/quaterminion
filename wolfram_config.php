<?php
$appID = 'LL448X-Q4JEKJEA5J';
$queryIsSet = isset($_REQUEST['inputX']);

if ($queryIsSet) {
    $qArgs = array();
    if (isset($_REQUEST['assumption']))
        $qArgs['assumption'] = $_REQUEST['assumption'];

    // instantiate an engine object with your app id
    $engine = new WolframAlphaEngine($appID);

    $response = $engine->getResults($_REQUEST['inputX'], $qArgs);
    if ($response->isError()) {
?>
        <hr>
        <h1>There was an error in the request</h1>
        <hr>
<?php
        die();
    }
}
?>

<?php
// if there are any assumptions, display them 
if ($queryIsSet) {
    if (count($response->getAssumptions()) > 0) {
?>
        <hr>
        <h2>Assumptions</h2>
        <hr>
        <ul>
            <?php
            // assumptions come as a hash of type as key and array of assumptions as value
            foreach ($response->getAssumptions() as $type => $assumptions) {
            ?>
                <li><?php echo $type; ?>:<br>
                    <ol>
                        <?php
                        foreach ($assumptions as $assumption) {
                        ?>
                            <li><?php echo $assumption->name . " - " . $assumption->description; ?>, to change search to this assumption <a href="index.php?q=<?php echo urlencode($_REQUEST['inputX']); ?>&assumption=<?php echo $assumption->input; ?>">click here</a></li>
                        <?php
                        }
                        ?>
                    </ol>
                </li>
            <?php
            }
            ?>

        </ul>
<?php
    }
}
?>

<?php
// if there are any pods, display them
if ($queryIsSet) {
    if (count($response->getPods()) > 0) {
?>
        <hr>
        <h2>Results</h2>
        <hr>
        <table border=1 width="80%" align="center">
            <?php
            foreach ($response->getPods() as $pod) {
            ?>
                <tr>
                    <td>
                        <h3><?php echo $pod->attributes['title']; ?></h3>
                        <?php
                        // each pod can contain multiple sub pods but must have at least one
                        foreach ($pod->getSubpods() as $subpod) {
                            // if format is an image, the subpod will contain a WAImage object
                        ?>
                            <img src="<?php echo $subpod->image->attributes['src']; ?>">
                            <hr>
                        <?php
                        }
                        ?>

                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php
    }
}
?>