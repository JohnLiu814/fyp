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
	         <a href="index.html">Viewer</a>
	         <?php echo $_SESSION['username'];
	         echo "in index"; ?>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
					<li><a class="smoothscroll"  href="#process" title="">Process</a></li>
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

   			<p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

   		</div>   		
   	</div>

   	<div class="row features-content">

   		<div class="features-list block-1-3 block-s-1-2 block-tab-full group">

	      	<div class="bgrid feature">	

	      		<span class="icon"><i class="icon-window"></i></span>            

	            <div class="service-content">	

	            	 <h3 class="h05">Fully Resposive</h3>

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
	         		</p>
	         		
	         	</div> 	         	 

				</div> <!-- /bgrid -->

				<div class="bgrid feature">	

					<span class="icon"><i class="icon-eye"></i></span>                          

	            <div class="service-content">	
	            	<h3 class="h05">Retina Ready</h3>  

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
	         		</p>

	         		
	            </div>	                          

			   </div> <!-- /bgrid -->

			   <div class="bgrid feature">

			   	<span class="icon"><i class="icon-paint-brush"></i></span>		            

	            <div class="service-content">
	            	<h3 class="h05">Stylish Design</h3>

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
	        			</p> 

	        			
	            </div> 	            	               

			   </div> <!-- /bgrid -->

				<div class="bgrid feature">

					<span class="icon"><i class="icon-file"></i></span>	              

	            <div class="service-content">
	            	<h3 class="h05">Clean Code</h3>

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
	         		</p> 

	         		
	            </div>                

				</div> <!-- /bgrid -->

			   <div class="bgrid feature">

			   	<span class="icon"><i class="icon-layers"></i></span>	            

	            <div class="service-content">	
	            	<h3 class="h05">Easy To Customize</h3>

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
	        			</p> 

	        			
	            </div>	               

			   </div> <!-- /bgrid -->

			   <div class="bgrid feature">

			   	<span class="icon"><i class="icon-gift"></i></span>	   	           

	            <div class="service-content">
	            	 <h3 class="h05">Free of Charge</h3>

		            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
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

   <section id="pricing">

   	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Our Pricing</h5>
   			<h1>Pick the best plan for you.</h1>

   			<p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

   		</div>   		
   	</div>

   	<div class="row pricing-content">

         <div class="pricing-tables block-1-4 group">

            <div class="bgrid"> 

            	<div class="price-block">

            		<div class="top-part">

	            		<h3 class="plan-title">Starter</h3>
		               <p class="plan-price"><sup>$</sup>4.99</p>
		               <p class="price-month">Per month</p>
		               <p class="price-meta">Billed Annually.</p>

	            	</div>                

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>3GB</strong> Storage</li>
		                  <li><strong>10GB</strong> Bandwidth</li>		                  
		                  <li><strong>5</strong> Databases</li>		                  
		                  <li><strong>30</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>

            	</div>           	
                        
			   </div> <!-- /price-block -->

            <div class="bgrid">

            	<div class="price-block primary">

            		<div class="top-part" data-info="recommended">

	            		<h3 class="plan-title">Standard</h3>
		               <p class="plan-price"><sup>$</sup>9.99</p>
		               <p class="price-month">Per month</p>
							<p class="price-meta">Billed Annually.</p>

	            	</div>               

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>5GB</strong> Storage</li>
		                  <li><strong>15GB</strong> Bandwidth</li>		                  
		                  <li><strong>7</strong> Databases</li>		                  
		                  <li><strong>40</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>
            		
            	</div>            	                 

			  </div> <!-- /price-block -->

           <div class="bgrid">               

               <div class="price-block">

            		<div class="top-part">

	            		<h3 class="plan-title">Premium</h3>
		               <p class="plan-price"><sup>$</sup>19.99</p>
		               <p class="price-month">Per month</p>
		                <p class="price-meta">Billed Annually.</p>		               

	            	</div> 
	            	
						<div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>10GB</strong> Storage</li>
		                  <li><strong>30GB</strong> Bandwidth</li>		                  
		                  <li><strong>15</strong> Databases</li>		                  
		                  <li><strong>60</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>	            		                
            		
            	</div>                              

			   </div> <!-- /price-block --> 

			   <div class="bgrid">               

               <div class="price-block">

            		<div class="top-part">

	            		<h3 class="plan-title">Ultimate</h3>
		               <p class="plan-price"><sup>$</sup>29.99</p>
		               <p class="price-month">Per month</p>
		               <p class="price-meta">Billed Annually.</p>		               

	            	</div> 
	            	
						<div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>20GB</strong> Storage</li>
		                  <li><strong>40GB</strong> Bandwidth</li>		                  
		                  <li><strong>25</strong> Databases</li>		                  
		                  <li><strong>100</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>	            		                
            		
            	</div>                              

			   </div> <!-- /price-block -->           

         </div> <!-- /pricing-tables --> 

      </div> <!-- /pricing-content --> 

   </section> <!-- /pricing --> 


   <!-- Testimonials Section
   ================================================== -->
   <section id="testimonials">

   	<div class="row">
   		<div class="col-twelve">
   			<h2 class="h01">Hear What Are Clients Say.</h2>
   		</div>   		
   	</div>   	

      <div class="row flex-container">
    
         <div id="testimonial-slider" class="flexslider">

            <ul class="slides">

               <li>
               	<div class="testimonial-author">
                    	<img src="images/avatars/avatar-1.jpg" alt="Author image">
                    	<div class="author-info">
                    		Steve Jobs
                    		<span class="position">CEO, Apple.</span>
                    	</div>
                  </div>

                  <p>
                  Your work is going to fill a large part of your life, and the only way to be truly satisfied is
                  to do what you believe is great work. And the only way to do great work is to love what you do.
                  If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.  						
                  </p>                  
             	</li> <!-- /slide -->

               <li> 

               	<div class="testimonial-author">
                    	<img src="images/avatars/avatar-2.jpg" alt="Author image">
                    	<div class="author-info">
                    		John Doe
                    		<span>CEO, ABC Corp.</span>
                    	</div>
                  </div> 

                  <p>
                  This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                  Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                  nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.    
                  </p>
                                         
               </li> <!-- /slide -->

            </ul> <!-- /slides -->

         </div> <!-- /testimonial-slider -->         
        
      </div> <!-- /flex-container -->

   </section> <!-- /testimonials -->


   <!-- faq
   ================================================== -->
   <section id="faq">

   	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Faq</h5>
   			<h1>Questions and Answers.</h1>

   			<p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

   		</div>   		
   	</div>

   	<div class="row faq-content">

   		<div class="q-and-a block-1-2 block-tab-full group">

   			<div class="bgrid">

   				<h3>What are the security features?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   			<div class="bgrid">

   				<h3>How can I update my user profile?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   			<div class="bgrid">

   				<h3>What features are not included in the free version?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   			<div class="bgrid">

   				<h3>Can I upgrade my account from Starter to Premium?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   			<div class="bgrid">

   				<h3>Where can I found all my uploads?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   			<div class="bgrid">

   				<h3>How long can I use the free trial version?</h3>

   				<p>Lorem ipsum Id in magna ad culpa dolor eu aute non amet aute ea in consectetur in quis nostrud anim proident dolore in sed et mollit voluptate culpa irure consequat laborum ea sint in mollit adipisicing cupidatat.</p>

   			</div>

   		</div> <!-- /q-and-a --> 
   		
   	</div> <!-- /faq-content --> 

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


   </section> <!-- /faq --> 

   <!-- cta
   ================================================== -->
   <section id="cta">

   	<div class="row cta-content">

   		<div class="col-twelve">

   			<h1 class="h01">Get started now. Try Lhander free for 30 days.</h1>

   			<p class="lead">Download the app now. Available on the:</p>

   			<ul class="stores">
   				<li class="app-store">
   					<a href="#" class="button round large" title="">
   						<i class="icon ion-social-apple"></i>App Store
   					</a>
   				</li>
   				<li class="play-store">
   					<a href="#" class="button round large" title="">
   						<i class="icon ion-social-android"></i>Play Store</a>
   					</li>
   				<li class="windows-store">
   					<a href="#" class="button round large" title="">
   						<i class="icon ion-social-windows"></i>Win Store</a>
   					</li>
   			</ul>

   		</div>

   	</div> <!-- /cta-content -->

   </section> <!-- /cta -->


   <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">

   		<div class="row">  

	      	<div class="col-four tab-full mob-full footer-info">            

	            <div class="footer-logo"></div>

	            <p>
		        	1600 Amphitheatre Parkway<br>
            	Mountain View, CA 94043 US<br>
		        	info@lhander.com &nbsp; +123-456-789
		        	</p>

		      </div> <!-- /footer-info -->

	      	<div class="col-two tab-1-3 mob-1-2 site-links">

	      		<h4>Site Links</h4>

	      		<ul>
	      			<li><a href="#">About Us</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>

	      	</div> <!-- /site-links -->  

	      	<div class="col-two tab-1-3 mob-1-2 social-links">

	      		<h4>Social</h4>

	      		<ul>
	      			<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Dribbble</a></li>
						<li><a href="#">Google+</a></li>
						<li><a href="#">Skype</a></li>
					</ul>
	      	           	
	      	</div> <!-- /social --> 

	      	<div class="col-four tab-1-3 mob-full footer-subscribe">

	      		<h4>Subscribe</h4>

	      		<p>Keep yourself updated. Subscribe to our newsletter.</p>

	      		<div class="subscribe-form">
	      	
	      			<form id="mc-form" class="group" novalidate="true">

							<input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="type email &amp; hit enter" required=""> 
	   		
			   			<input type="submit" name="subscribe" >
		   	
		   				<label for="mc-email" class="subscribe-message"></label>
			
						</form>

	      		</div>	      		
	      	           	
	      	</div> <!-- /subscribe -->         

	      </div> <!-- /row -->

   	</div> <!-- /footer-main -->


      <div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Lhander 2016.</span> 
		         	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>		         	
		         </div>

		         <div id="go-top" style="display: block;">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
		         </div>         
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