<?php
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : "1";
    $per_page = isset($_GET['per_page']) ? htmlspecialchars($_GET['per_page']) : "10";
    $plantList = json_decode(file_get_contents("http://api.landscapeit.dev/vislib/v1?page=" . $page . "&per_page=" . $per_page),false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Marc McKeown">

    <title><?php echo $plantList->msg ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="visuallibrary.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1><?php echo $plantList->msg ?></h1>
    </div>

    <div class="row">
        <div class="col-md-7"><h2>Botanical name</h2></div>
        <div class="col-md-5"><h2>Common Name</h2></div>
    </div>

    <?php foreach($plantList->plants as $plant): ?>
        <div class="row">
            <div class="col-md-7"><h2><a href="plant.php?id=<?php echo $plant->id ?>&page=<?php echo $page ?>&per_page=<?php echo $per_page ?>"><?php echo $plant->botanical_name ?></a></h2></div>
            <div class="col-md-5"><h2><a href="plant.php?id=<?php echo $plant->id ?>&page=<?php echo $page ?>&per_page=<?php echo $per_page ?>"><?php echo $plant->common_name ?></a></h2></div>
        </div>
    <?php endforeach; ?>

    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->current_page != 1) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=1&per_page=" . $plantList->summary->per_page . "'>" ?>
                First
                <?php if($plantList->summary->current_page != 1) echo "</a>" ?>
            </div>
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->current_page - 5 >= 1) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($plantList->summary->current_page - 5) . "&per_page=" . $plantList->summary->per_page . "'>" ?>
                <<
                <?php if($plantList->summary->current_page - 5 >= 1) echo "</a>" ?>
            </div>
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->prev_page_url) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($plantList->summary->current_page - 1) . "&per_page=" . $plantList->summary->per_page . "'>" ?>
                Previous
                <?php if($plantList->summary->prev_page_url) echo "</a>" ?>
            </div>
            <div class="col-md-6">
                <p class="summary">Page <?php echo $plantList->summary->current_page ?> of <?php echo $plantList->summary->last_page ?></p>
                <p class="summary smaller">Showing plants <?php echo $plantList->summary->from ?> through <?php echo $plantList->summary->to ?> of <?php echo $plantList->summary->total ?> total</p>
            </div>
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->next_page_url) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($plantList->summary->current_page + 1) . "&per_page=" . $plantList->summary->per_page . "'>" ?>
                Next
                <?php if($plantList->summary->next_page_url) echo "</a>" ?>
            </div>
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->current_page + 5 <= $plantList->summary->last_page) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($plantList->summary->current_page + 5) . "&per_page=" . $plantList->summary->per_page . "'>" ?>
                >>
                <?php if($plantList->summary->current_page + 5 <= $plantList->summary->last_page) echo "</a>" ?>
            </div>
            <div class="col-md-1 page-nav">
                <?php if($plantList->summary->current_page != $plantList->summary->last_page) echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $plantList->summary->last_page . "&per_page=" . $plantList->summary->per_page . "'>" ?>
                Last
                <?php if($plantList->summary->current_page != $plantList->summary->last_page) echo "</a>" ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
