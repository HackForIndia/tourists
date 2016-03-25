<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EduForce | Retrive and Rank Demo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .txt {
            font-size: 24pt;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    
                    <a href="#">
                        EduForce | Lessons
                    </a>
                </li>
                <li>
                    
                </li>
                <li class="active">
                    <a href="#">Lesson 1</a>
                </li>
                <li>
                    <a href="#">Lesson 2</a>
                </li>
                <li>
                    <a href="#">Lesson 3</a>
                </li>
                <li>
                    <a href="#">Lesson 4</a>
                </li>
                <li>
                    <a href="#">Lesson 5</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" id="menu-toggle">Toggle Sidebar</a>
                        <p>This demo shows the usage of Retrieve and Rank Watson API, the answers to queries are sorted by placing MOST relevant and best suited answer first.</p>
                        <p>Usage: This API can be used to help students find best and relevant answers towards the top rather than searching the whole forum.</p>
                        <h1>Lesson 1</h1>
                        <iframe style="width:100%;height:500px;" src="https://www.youtube.com/embed/_9qwbichO1s?list=PLbMVogVj5nJRMx9Ou8luatlFpTpZJTxu2" frameborder="0" allowfullscreen></iframe>
                    
                        <p class="txt">Introduction to Aero Dynamics</p>
                        <br>
                        <p class="txt">Discussions</p>
                        <input style="width:400px;height:40px;" type="text" placeholder="Enter your Queries here!" /><br><br>
                        <?php 
                            include "data/questions.php";
                            $i=1;
                            echo '<b>Most Relevant/Best Answers First</b><br><br>';
                            foreach($questions as $question) {
                                
                                $q = str_replace("%20"," ",$question);
                                echo '<p style="font-size:16pt;"><b>'.$i.'. '.$q. '</b></p><br><br>';
                                $cmd='curl -u "e0ee7f7e-ac79-4ac5-8f80-e1eb23c154be":"jmmzXVafESmq" "https://gateway.watsonplatform.net/retrieve-and-rank/api/v1/solr_clusters/sc4a7e4201_abb9_41e3_9be5_1435b3552c1b/solr/example_collection/fcselect?ranker_id=868fe3x12-rank-228&q='.$question.'&wt=json&fl=id,title"';
                            exec($cmd,$result);
                            $data= json_decode($result[0]);
                            #echo $data->response;
                            $j=1;
                            foreach($data->response->docs as $item){
                                echo $j. '. ';
                                print_r($item->title[0]);
                                echo '<br><br>';
                                $j++;
                            }
                            echo '<input style="width:400px;height:40px;" type="text" placeholder="Enter your answers here!" /><br><br>';
                            echo '<br><br>';
                            $i++;
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
