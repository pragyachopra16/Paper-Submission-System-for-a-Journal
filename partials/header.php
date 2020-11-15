<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title><?php echo ($page_title??"No Title"); ?></title>
  </head>
  <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><h2 class="text-white">UofW Journal</h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="ml-auto clearfix">
        <?php if(isset($user)){ ?>

        <h6 class="text-light"> <?php echo "Hi, ". $user['data']['name'] ;?>
           &nbsp; <a class="text-muted pull-right" href="logout.php"> [Logout]</a>
        </h6>
      <?php }else{ ?>
        <h6 class="text-light"> Not Logged In</h6>
        <?php }?>
      </div>
    </nav>
