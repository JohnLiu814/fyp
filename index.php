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
	         <a href="index.php">Viewer</a>
	         
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
					<li><a class="smoothscroll"  href="#process" title="">Process</a></li>
					<li><a class="smoothscroll"  href="#features" title="">Features</a></li>
					<li><a class="smoothscroll"  href="#testimonials" title="">Feedback</a></li>					
					
					<li class="highlight with-sep" id="dropdownform"><a href="#"  id="dropbox" > Login/SignUp</a>
						<!--<div class="container disable" id="LoginSignupform"   >
							<input id="txtEmail" type="email" placeholder="Email">
							<input id="txtPassword" type="password" placeholder="Password">
							<button id ="btnLogin" class="btn btn-action">Log in </button>
							<button id ="btnSignUp" class="btn btn-secondary">Sign Up</button>
							<button id ="btnLogout" class="btn btn-action hide">Log out</button>
						</div>-->
						<form method="post" action="reglogin.php" class="disable" id="LoginSignupform">	
							<input type="text" placeholder="Username" name="username">
							<input type="password" placeholder="Password" name="password">
							<input type="submit" name="loginbtn" value="Login">
							<input type="submit" name="regbtn" value="Register">
							<input type="hidden" id="checkbutton" name="checkbutton">

						
						</form>
					</li>	


				<!--
					<li class="highlight with-sep"><a href="#" id="dropbox" onclick=myFunction()> Sign Up</a><div id="firebaseui-auth-container" class="dropdown-content" style="display:none"></div></li>		-->			
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		

   	
       

   </header> <!-- /header -->

	<!-- user section
	<section id="pricing" style="display:">
	<div id="file">
		<progress value="0" max="100" id="uploader">0%</progress>
		<input type="file" value="upload" id="fileButton" />
	</div>

	<div id-"display">
	</div>

	</section>

	==================================== -->



	
   



   

  <!-- real intro ============================== -->
   
   	<section id="intro" class="realintro" >

   		<div class="shadow-overlay"></div>

   		<div class="intro-content">
   			<div class="row">

   				<div class = 'introdiv'>
   					<div class="col-twelve">

	

	   					<h5>Hello welcome to 3D model viewer.</h5>
	   					<h1>A unique, enhanced 3D model viewer.</h1>

	   					<a class="button stroke smoothscroll" href="#process" title="">Learn More</a>

	   				</div>  
   				</div>
   			</div>   		 		
   		</div> 
   		</section>
   	
  <!-- ====================================  -->

  <!-- intro section
   ================================================== -->
   <section id="intro" style="display:none">

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
   <section id="process" class="realprocess">  

   	<div class="row section-intro">
   		<div class=" with-bottom-line">

   			<h5>Process</h5>
   			<h1>How it works?</h1>

   			<p class="lead">Just few simple steps to get start with our viewer.</p>

   		</div>   		
   	</div>

   	<div class="row process-content">

   		<div class="left-side">

   			<div class="item" data-item="1">

   				<h5>Sign Up</h5>

   				<p>If you do not have an account, sign up at the top right corner of the web page.  </p>
   					
   			</div>

   			<div class="item" data-item="2">

	   			<h5>Log in</h5>

	   			<p>After you have an account, you can now log in at the same place you sign up (top right corner of the webpage).</p>
   			</div>
   				
   		</div> <!-- /left-side -->
   		
   		<div class="right-side">
   				
   			<div class="item" data-item="3">

   				<h5>Upload</h5>

   				<p>After you logged in, you will be directed to a different page. There, you can start using our 3D model viewer by uploading your own 3D models. </p>
   					
   			</div>

   			<div class="item" data-item="4">

   				<h5>View</h5>

   				<p>You can also view your 3D models you have uploaded before.</p>
   					
   			</div>

   		</div> <!-- /right-side -->  

   		<div class="image-part"></div>  			

   	</div> <!-- /process-content --> 

   </section> <!-- /process-->    


<!-- Process Section
   ================================================== -->
   <section id="process" style="display:none">  

   	<div class="row section-intro">
   		<div class=" with-bottom-line">

   			<h1>Model Page</h5>
   			<h2>You can view your 3D models in this page.</h1>		

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

   </section> <!-- /process-->    
   <!-- end of model page ======================== -->


   <!-- features Section
   ================================================== -->
	<section id="features">

		<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Features</h5>
   			<h1>Great features you'll love.</h1>



   		</div>   		
   	</div>

   	<div class="row features-content">

   		<div class="features-list block-1-3 block-s-1-2 block-tab-full group">

	      	<div class="bgrid feature">	

	      		<span class="icon"><i class="icon-window"></i></span>            

	            <div class="service-content">	

	            	 <h3 class="h05">LOD (Level of detail)</h3>

		            <p>Our 3D model are displayed using LOD which hides the unnecessary details of the 3D model, resulting in faster loading time and low consumption of your computer resources. 
	         		</p>
	         		
	         	</div> 	         	 

				</div> <!-- /bgrid -->

				<div class="bgrid feature">	

					<span class="icon"><i class="icon-eye"></i></span>                          

	            <div class="service-content">	
	            	<h3 class="h05">Easy-to-use</h3>  

		            <p>You can start using our 3D model viewer in just a few step. Each step requires only one or two button to click.
	         		</p>

	         		
	            </div>	                          

			   </div> <!-- /bgrid -->

			   <div class="bgrid feature">

			   	<span class="icon"><i class="icon-paint-brush"></i></span>		            

	            <div class="service-content">
	            	<h3 class="h05">Free-of-charge</h3>

		            <p>Our 3D model viewer is free-of-charge as we rely on web advertisement to gain income to maintain our website.
	        			</p> 

	        			
	            </div> 	            	               

			   </div> <!-- /bgrid -->

				<div class="bgrid feature">

					<span class="icon"><i class="icon-file"></i></span>	              

	            <div class="service-content">
	            	<h3 class="h05">Unlimited uploads</h3>

		            <p>We have a large database that allows you upload 3D models as much as you want.
	         		</p> 

	         		
	            </div>                

				</div> <!-- /bgrid -->


	      </div> <!-- features-list -->
   		
   	</div> <!-- features-content -->
		
	</section> <!-- /features -->
	

<!-- signing
   ================================================== -->
   
   <!--<div id="firebaseui-auth-container"></div>-->

	<!-- pricing
   ================================================== -->

   

   <!-- Testimonials Section
   ================================================== -->
   <section id="testimonials">

   	<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01">Hear What Are Testers Say.</h2>
   		</div>   		
   	</div>   	

      <div class="row flex-container">
    
         <div id="testimonial-slider" class="flexslider">

            <ul class="slides">

               <li>
               	<div class="testimonial-author">
                    	<img src="images/avatars/avatar-1.jpg" alt="Author image">
                    	<div class="author-info">
                    		Mr Wong
                    		<span class="position">CS, HKUST Student</span>
                    	</div>
                  </div>

                  <p>
                  Your Viewer works perfectly for me. Especially for the nearly full screen viewing, the control is very smooth.  						
                  </p>                  
             	</li> <!-- /slide -->

               <li> 

               	<div class="testimonial-author">
                    	<img src="images/avatars/avatar-2.jpg" alt="Author image">
                    	<div class="author-info">
                    		John Doe
                    		<span>CS, HKUST Student</span>
                    	</div>
                  </div> 

                  <p>
                  There are still some improvements needed, however, the overall performance is pretty good! 
                  </p>
                                         
               </li> <!-- /slide -->

            </ul> <!-- /slides -->

         </div> <!-- /testimonial-slider -->         
        
      </div> <!-- /flex-container -->

   </section> <!-- /testimonials -->


   <!-- faq
   ================================================== -->
  <!-- <section id="faq">-->
   <!-- footer
   ================================================== -->
   

   	


        <div class="footer-bottom">

      	<div class="row">

      		
	      		<div class="copyright">
		         	<span></span> 
		         	<span>Design by <a href="">HKUST FYP Team, QUAN 1</a></span>		         	
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