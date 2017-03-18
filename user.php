<?php
	session_start();
	
	
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Viewer</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css"> 


   <!--<link rel="stylesheet" href="css/sigininbox.css">-->

   <!-- script
   ================================================== -->


<script src="https://www.gstatic.com/firebasejs/3.6.4/firebase.js"></script>
<script src="js/three.js"></script> 
<script src="js/TrackballControls.js"></script> 
<script src="js/Detector.js"></script> 
<script src="js/stats.js"></script> 
<script src="http://threejs.org/build/three.min.js"></script> 
<script src="http://threejs.org/examples/js/loaders/MTLLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/OBJLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/DDSLoader.js"></script> 
<script src="http://threejs.org/examples/js/Detector.js"></script> 
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script> 
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCoJAhJG5ks86-eX7B5Snt6UHlw4MvPboc",
    authDomain: "fyp4-d9796.firebaseapp.com",
    databaseURL: "https://fyp4-d9796.firebaseio.com",
    storageBucket: "fyp4-d9796.appspot.com",
    messagingSenderId: "977086411556"
  };
  firebase.initializeApp(config);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	
	   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="favicon.ico">

	
	 
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.css" />
    <!--<script type="text/javascript">
      // FirebaseUI config.
      var uiConfig = {
        signInSuccessUrl: 'index.html',
        signInOptions: [
          // Leave the lines as is for the providers you want to offer your users.
          //firebase.auth.GoogleAuthProvider.PROVIDER_ID,
          //firebase.auth.FacebookAuthProvider.PROVIDER_ID,
          //firebase.auth.TwitterAuthProvider.PROVIDER_ID,
         // firebase.auth.GithubAuthProvider.PROVIDER_ID,
          firebase.auth.EmailAuthProvider.PROVIDER_ID
        ],
        // Terms of service url.
        tosUrl: ''
      };

      // Initialize the FirebaseUI Widget using Firebase.
      var ui = new firebaseui.auth.AuthUI(firebase.auth());
      // The start method will wait until the DOM is loaded.
      ui.start('#firebaseui-auth-container', uiConfig);
    </script>-->

	

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="favicon.ico">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header>

   	<p class="row">

   		<div class="logo">
	         <a href="user.php">Viewer</a>
	       
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
					<li><a class="smoothscroll"  href="#process" title="">Models</a></li>
					<li><a class="smoothscroll"  href="#features" title="">Features</a></li>
					<li><a class="smoothscroll"  href="#pricing" title="">Pricing</a></li>
					<li><a class="smoothscroll"  href="#faq" title="">FAQ</a></li>					
					
					<li class="highlight with-sep" id="dropdownform"><a href="#"  id="dropbox" > Login/SignUp</a>
						<!--<div class="container disable" id="LoginSignupform"   >
							<input id="txtEmail" type="email" placeholder="Email">
							<input id="txtPassword" type="password" placeholder="Password">
							<button id ="btnLogin" class="btn btn-action">Log in </button>
							<button id ="btnSignUp" class="btn btn-secondary">Sign Up</button>
							<button id ="btnLogout" class="btn btn-action hide">Log out</button>
						</div>-->
						<form method="post" action="reglogin.php" class="disable" id="LoginSignupform">
						
							
							
							<input type="submit" name="logoutbtn" value="Logout">
							<input type="hidden" id="checkbutton" name="checkbutton">

						
						</form>
					</li>	


				<!--
					<li class="highlight with-sep"><a href="#" id="dropbox" onclick=myFunction()> Sign Up</a><div id="firebaseui-auth-container" class="dropdown-content" style="display:none"></div></li>		-->			
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		

   	
       

   </header>
   

 

  <!-- intro section
   ================================================== -->
   <section id="intro" style="display: block">

   	<div class="shadow-overlay"></div>

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<h1>User Page</h1>
	   			<h2 style="color:#ffffff">Here you can upload your 3D model, follow the steps below: </h2>
	   			<div id="file" class="fileUpload btn btn-primary">
					
						
					<form enctype="multipart/form-data" action="upload_file.php" method="post">
						<h2 style="color:#ffffff"> 1) Enter the model name :</h2><br>
						<input type="text" name="modelname" style="display: inline" ><br>
						<h2 style="color:#ffffff"> 2) Browse for File to Upload : </h2> 
						<input name="file_array[]" type="file" id="file"   size="80" multiple> <br>

						<input type="submit" id="u_button" value="Upload the File">
						<input type="hidden"  name="userID" id="hiddenUserId">
					</form>

				</div>

	

	   			

	   			<a class="button stroke smoothscroll" href="#process" title="">Check out your 3D models!</a>

	   		</div>  
   			
   		</div>   		 		
   	</div> 

   	<!-- Modal Popup
	   ========================================================= -->

      	

   </section> <!-- /intro -->

   <!-- model page ==============================-->

  

<!-- Process Section
   ================================================== -->
   <section id="process">  

   	<div class="row section-intro">
   		<div class=" with-bottom-line">

   			<h1>Model Page</h1>
   			<h2>You can view your 3D models in this page.</h2>
   			
   			<?php 
   				//$display = $_SESSION['display'];
   				$db = mysqli_connect("localhost","root","","fyp");
   				$username = $_SESSION['username'];
   				$sqlgetnum = "SELECT modelnum FROM users WHERE username = '$username'";
				$resultnum = mysqli_query($db, $sqlgetnum);
				$modelrow = mysqli_fetch_assoc($resultnum);
				$modelnum = $modelrow['modelnum'];
				$_SESSION['modelnum'] = $modelnum;
				$modelnum = $_SESSION['modelnum'];

				$sqlgetname = "SELECT modelname FROM $username";
				$resultname = mysqli_query($db, $sqlgetname);
				

   				echo  "<h2> The number of 3D model you own is:  $modelnum  </h2>";
   				echo "<h2>";
   				echo '<form method="post" action="deletefile.php" id="loaddelform">';
   				echo "Choose your model here:  ";
   				
   				echo '<select name="modeldropdown" id="modeldropdown">';
   				echo "<option value='Select a model'>" . "Select a model".       "</option>";
   				while($namefetch = mysqli_fetch_array($resultname)){
   					echo "<option value='" . $namefetch['modelname'] ."'>" . $namefetch['modelname'] ."</option>";
   				}
   				echo '</select>';
   			
   				echo '<input type="submit" name="loadbtn" value="Load" onclick="myfunction()">';
				echo '<input type="submit" name="delbtn" value="Delete">';
				echo '<input type="submit" name="downbtn" value="Download">';
   				echo '</form>';
   				echo "</h2>";

   			 ?>
   			

   	</div> <!-- /process-content --> 

   	<div class="image-part"></div>  
   			
   			<div id="square">
   			
  
   				
   				
   			<style>
#fakebody {
	color: #000;
	font-family: Monospace;
	font-size: 13px;
	text-align: center;
	font-weight: bold;
	background-color: #fff;
	margin: 0px;
	overflow: hidden;
}
#info {
	color: #000;
	position: absolute;
	top: 0px;
	width: 100%;
	padding: 5px;
}
a {
	color: red;
}

</style>

<script src="js/TrackballControls.js"></script> 
<script src="js/Detector.js"></script> 
<script src="js/stats.js"></script> 
<script src="http://threejs.org/build/three.min.js"></script> 
<div id="fakebody"  >
<div id="container" style="width:600px height:600px">
<canvas id="canvas" style="width:600px height:600px"  ></canvas>
</div>
<script src="js/three.js"></script> 
<script src="http://threejs.org/examples/js/loaders/MTLLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/OBJLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/DDSLoader.js"></script> 
<script src="http://threejs.org/examples/js/Detector.js"></script> 
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>


   			
   			<script>
   			
		/*if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
			var container, stats;
			var camera, controls, scene, renderer;
			var cross;
			init();
			animate();
				
			function init() {
				camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
		 var canvas = document.getElementById('canvas');
				
				

				camera.position.z = 500;
				controls = new THREE.TrackballControls( camera );
				controls.rotateSpeed = 10.0;
				controls.zoomSpeed = 1.2;
				controls.panSpeed = 0.8;
				controls.noZoom = false;
				controls.noPan = false;
				controls.staticMoving = true;
				controls.dynamicDampingFactor = 0.3;
				controls.keys = [ 65, 83, 68 ];
				controls.addEventListener( 'change', render );
				// world
				scene = new THREE.Scene();
				scene.fog = new THREE.FogExp2( 0xcccccc, 0.002 );

				var onProgress = function ( xhr ) {
					if ( xhr.lengthComputable ) {
						var percentComplete = xhr.loaded / xhr.total * 100;
						console.log( Math.round(percentComplete, 2) + '% downloaded' );
					}
				};

				var onError = function ( xhr ) { };

				THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );

				var mtlLoader = new THREE.MTLLoader();				mtlLoader.load( "tile_0_0_0_tex.mtl", function( materials ) {

					materials.preload();

					var objLoader = new THREE.OBJLoader();
					objLoader.setMaterials( materials );
					objLoader.load( "tile_0_0_0_tex.obj", function ( object ) {

						scene.add( object );


					}, onProgress, onError );

				});

				// lights
				light = new THREE.DirectionalLight( 0xffffff );
				light.position.set( 1, 1, 1 );
				scene.add( light );
				light = new THREE.DirectionalLight( 0x002288 );
				light.position.set( -1, -1, -1 );
				scene.add( light );
				light = new THREE.AmbientLight( 0x222222 );
				scene.add( light );

				// renderer
				renderer = new THREE.WebGLRenderer( { canvas : canvas } );
				//me add ;D
				/*renderer.setViewport(0, 0, canvas.clientWidth, canvas.clientHeight);

				renderer.setClearColor( scene.fog.color );
				renderer.setPixelRatio( window.devicePixelRatio );
				container = document.getElementById( 'container' );
				renderer.setSize($(container).width(),$(container).height());
				renderer.setSize( window.innerWidth, window.innerHeight );
				
				//container.appendChild( renderer.domElement );
				stats = new Stats();
				window.addEventListener( 'resize', onWindowResize, false );
				render();
			}

			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
				controls.handleResize();
				render();
			}
			function animate() {
				requestAnimationFrame( animate );
				controls.update();
			}
			function render() {
				renderer.render( scene, camera );
				stats.update();
			}*/

		</script>
		
   				</div>
   			</div>	
   			<script>
   			var display = <?php echo $_SESSION['display']; ?>	
   				//alert(display);
   				if(true){
   					if(display == 1){
   				 		//alert("before block");
   				 		document.getElementById("square").style.display="block";
   				 		//alert("after block");
   					}else {
   						//alert("before none");
   						document.getElementById("square").style.display="none";
   						//alert("after none");
   					}
   				}
   			
   			</script>

   </section> <!-- /process-->    
   <!-- end of model page ======================== -->


   
 
   
   	<div class="row section-ads">

		   <div class="col-twelve">	

		     	<div class="ad-content">

		     		<h2 class="h01"><a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Styleshout Recommends Dreamhost.</a></h2>

			      <p class="lead">
			      Looking for an awesome and reliable webhosting? Try <a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT"><span>DreamHost</span></a>.
					Get <span>$50 off</span> when you sign up with the promocode <span>styleshout</span>. 
					<!-- Simply type	the promocode in the box labeled “Promo Code” when placing your order. -->					
					</p>

					<div class="action">
			         <a class="button large round" href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Sign Up Now</a>
		        	</div>

		     	</div>			      

			</div>

		</div> <!-- /section-ads --> 




   

   


      <div class="footer-bottom">

      	<div class="row">

      		
	      		<div class="copyright">
		         	<span></span> 
		         	<span>Design by <a href="">HKUST FYP Team</a></span>		         	
		         </div>

		         <div id="go-top" style="display: block;">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
		               
	      	</div>

      	</div> <!-- /footer-bottom -->     	

      </div>

   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/user.js"></script>
   <script src="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.js"></script>
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
   <script src="js/app.js"></script>
   <script src="js/modernizr.js"></script>
</body>

</html>