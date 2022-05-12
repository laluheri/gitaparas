
<!DOCTYPE html>
<html>
	<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You can edit this line in _config.yml. It will appear in your document  head meta (for Google search results) and in your feed.xml site  description.">
    <meta name="author" content="Your Name">

    <title>Landing Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://shaneweng.com/landing-page-theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/landing-page.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

	<body>
		<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="{{asset('images/logo-dispusarsip.png')}}" alt="logo klu" style="max-height:80px;">
            <img src="{{asset('images/logo-anri.jpg')}}" alt="logo anri" style="max-width:272px;">
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<section id="home">
<!-- Header -->
	<div class="intro-header">

		<div class="container">

			<div class="row">
				<div class="col-lg-12">
					<div class="intro-message">
						<h1>Gitaparas</h1>
						<h3>Digitalisasi Pengelolaan Arsip Dinas</h3>
						<hr class="intro-divider">
						<ul class="list-inline intro-social-buttons">
							
							<li>
								<a href="{{route('login')}}" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Signin</span></a>
							</li>
							
						</ul>
            
					</div>
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.intro-header -->
</section>

        </div>
        <!-- /.container -->

    </div>
</section>
	</body>
</html>
