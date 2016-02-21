
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <form id="loginForm" class="navbar-form navbar-right" action="login.php" method="POST">
                    <input type="text" class="form-control" name="username" placeholder="username">
                    <input type="password" class="form-control" name="password" placeholder="password">
                    <input type="submit" class="form-control btn btn-primary">
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">

            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Dashboard</h1>
                <h2 class="sub-header">Section title</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                        </thead>
                        <tbody id="data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(function(){
        // Data table
        $.ajax({
            url: '/api/table.php',
            data: {
                format: 'json'
            },
            dataType: 'jsonp',
            success: function(data) {
                table = $("#data");
                $.each(data, function( index, value ) {
                    table.append("<tr><td>" + value.name + "</td><td>" + value.address + "</td><td>" + value.text + "</td></tr>");
                });
            },
            type: 'GET'
        });

        // Menu
        $.ajax({
            url: '/api/menu.php',
            data: {
                format: 'json'
            },
            dataType: 'jsonp',
            success: function(data) {
                sidebar = $(".sidebar");
                $.each(data, function( index, group ) {
                    ul = '<ul class="nav nav-sidebar">';
                    $.each(group, function( index, item ) {
                        ul += "<li><a href='#'>" + item + "</a></li>";
                    });
                    sidebar.append(ul + "</ul>");
                });
            },
            type: 'GET'
        });
    });
    </script>
</body>
</html>
