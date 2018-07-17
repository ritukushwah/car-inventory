<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="<?php echo base_url().THEME; ?>custom/tostar/toastr.min.css" rel="stylesheet"> <!-- toastr popup -->
<script src="<?php echo base_url().THEME; ?>custom/tostar/toastr.min.js"></script>
<script src="<?php echo base_url().THEME; ?>custom/js/common.js"></script>
<link href="<?php echo base_url().THEME; ?>custom/css/custom.css" rel="stylesheet">

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Mini Car Inventory System</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Mini Car Inventory System</h1>
                
            </header>
            <section>               
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php echo base_url('home/addModel') ?>" autocomplete="on"> 
                                <h1>Model</h1> 
                                <p> 
                                    <label for="username" class="uname" >Enter Model</label>
                                    <input id="manufacturerName" name="modelName" type="text" placeholder="Enter model"/>
                                </p>
                                <p> 
                                    <label for="username" class="uname" >Select manufacturer</label>
                                    <select id="manufacturer" name="manufacturer">
                                        <option value="">Select manufacturer</option>
                                        <?php foreach ($manufacturer as $value) { ?>
                                            <option value="<?php echo $value->manufacturerId; ?>"><?php echo $value->manufacturerName; ?></option>
                                        <?php }  ?>
                                    </select>
                                </p>
                                <p class="login button"> 
                                    <button type="button" class="add_model" id="add_model">Submit</button>
                                    <a href="<?php echo base_url('home/') ?>"><button type="button">Add manufacturer</button></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
