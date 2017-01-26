<?php
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : "1";
    $per_page = isset($_GET['per_page']) ? htmlspecialchars($_GET['per_page']) : "10";
    $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : "bad";
    $plant = json_decode(file_get_contents("http://api.landscapeit.com/vislib/v1/" . $id),false);
    if (!isset($plant)) { header('Location: listphp.php'); exit; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Marc McKeown">

    <title><?php echo $plant->msg ?> - <?php echo $plant->info->botanical_name ?></title>

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
        <h1><?php echo $plant->msg ?></h1>
    </div>

    <?php if(isset($plant->info->botanical_name)): ?>
        <div class="row top-space">
            <div class="description"><em><?php echo $plant->info->botanical_name ?></em></div>
        </div>
        <?php if(isset($plant->info->alternate_botanical_name_list)): ?>
            <div class="row"><div class="sub-name"><?php echo $plant->info->alternate_botanical_name_list ?></div></div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($plant->info->common_name)): ?>
        <div class="row top-space">
            <div class="description"><?php echo $plant->info->common_name ?></div>
        </div>
        <?php if(isset($plant->info->alternate_common_name_list)): ?>
            <div class="row"><div class="sub-name"><?php echo $plant->info->alternate_common_name_list ?></div></div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="row top-space">
        <div class="title bottom-space">Details</div>
    </div>
    <?php if(isset($plant->info->type)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->type ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->height)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->height ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->width)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->width ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->bloom_months_list)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->bloom_months_list ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->flower_color)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->flower_color ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->sun_exposure)): ?>
        <div class="row"><div class="sub-description"><?php echo $plant->info->sun_exposure ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->hardiness)): ?>
        <div class="row"><div class="sub-description">Hardy to <?php echo $plant->info->hardiness ?></div></div>
    <?php endif; ?>
    <?php if(isset($plant->info->zone)): ?>
        <div class="row"><div class="sub-description">Zone <?php (strlen($plant->info->zone<3) ? "s" :"") ?><?php echo $plant->info->zone ?></div></div>
    <?php endif; ?>
    <?php if(count($plant->info->specifications)>0): ?>
        <div class="row top-space">
            <div class="title bottom-space">Specifications</div>
            <?php foreach($plant->info->specifications as $spec): ?>
                <div class="sub-description"><img src="<?php echo $spec->icon ?>" alt="<?php echo $spec->specification ?>"> <?php echo $spec->specification ?></div>
                <?php if(isset($spec->note)): ?>
                    <div class="sub-name bottom-space"><?php echo $spec->note ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if(count($plant->info->notes)>0): ?>
        <div class="row top-space">
            <div class="title bottom-space">Notes</div>
            <?php foreach($plant->info->notes as $note): ?>
                <div class="sub-description"><?php echo $note ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if(count($plant->info->images)>0): ?>
        <div class="row top-space">
            <div class="title bottom-space">Images</div>
        </div>
        <?php
            $count = 0;
            foreach($plant->info->images as $image) {
                $count++;
                if($count == 1) echo '<div class="row top-space">';
                echo '<div class="col-md-4"><img src="' . $image->image . '">';
                    if(isset($image->description)) echo '<p class="sub-name">' . $image->description . '</p>';
                echo '</div>';
                if($count == 3) { $count = 0; echo '</div>'; }
            }
            if ($count != 0) echo '</div>';
        ?>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-3 page-nav"></div>
            <div class="col-md-6">
                <p class="summary"><a href="listphp.php?page=<?php echo $page ?>&per_page=<?php echo $per_page ?>">Back to Plant List</a></p>
            </div>
            <div class="col-md-3 page-nav"></div>
        </div>
    </div>




</div>
</body>
</html>
