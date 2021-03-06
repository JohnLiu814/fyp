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
										
					
					<li class="highlight with-sep" id="dropdownform"><a href="#"  id="dropbox" > Logout</a>
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
   				echo '<input type="submit" name="loadfull" value="View in Full Page" onclick="myfunction()">';
				echo '<input type="submit" name="delbtn" value="Delete">';
				echo '<input type="submit" name="downbtn" value="Download">';
   				echo '</form>';
   				echo "</h2>";

   			 ?>
   			

   	</div> <!-- /process-content --> 

   	<div class="image-part"></div>  
   			
   			<div id="square">
   			
  
   				
   				
   			<style>
#square {
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
<!--<div id="fakebody" >-->
<div id="container">
<canvas id="canvas"  ></canvas>
</div>
<script src="js/three.js"></script> 
<script src="http://threejs.org/examples/js/loaders/MTLLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/OBJLoader.js"></script> 
<script src="http://threejs.org/examples/js/loaders/DDSLoader.js"></script> 
<script src="http://threejs.org/examples/js/Detector.js"></script> 
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
<?php 
$halfPath = $_SESSION['halfPath'];
?>

   		<!--start-->	
   		<script>
   			var fullPath =  "<?php echo $halfPath; ?>"
			if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
			var container, stats;
			var camera, controls, scene, renderer;
			var cross;
			init();
			animate();
			var gobalBBOX;
			var deleteArray=[];
			function init() {
					//I comment
				//camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
				//I add
				///////////////////////
				camera = new THREE.PerspectiveCamera( 60, 1024/768, 1, 1000 );
                 ///////////////////////                             //  console.log();
//camera.zoom=3;
				camera.position.z = 400;
				camera.position.x = 0;
				camera.position.y = 0;
				//controls = new THREE.TrackballControls( camera );
				////////////////////////////
				//I add
				var element = document.getElementById("container");
				controls = new THREE.TrackballControls( camera,element);//I added
				//I add
				////////////////////////////


				controls.rotateSpeed = 10.0;
				controls.zoomSpeed = 1.2;
				controls.panSpeed = 0.8;
				controls.noZoom = false;
				controls.noPan = false;
				///////////////////
				controls.noRotate = false;
				///////////////////
				controls.staticMoving = true;
				controls.dynamicDampingFactor = 0.3;
				controls.keys = [ 65, 83, 68 ];
				controls.addEventListener( 'change', render );
				// world
				scene = new THREE.Scene();
				scene.fog = new THREE.FogExp2( 0xcccccc, 0.002 );
/*
			
				}
*/

var onProgress = function ( xhr ) {
					if ( xhr.lengthComputable ) {
						var percentComplete = xhr.loaded / xhr.total * 100;
						console.log( Math.round(percentComplete, 2) + '% downloaded' );
					}
				}; // end of on

				var onError = function ( xhr ) { };

				THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );

				var mtlLoader = new THREE.MTLLoader();
				mtlLoader.setPath(fullPath);
				
				
                var xI=1;
                var yI=0;
                var zI=0;
                var finXYZ =1;
 //creation            
function abc(a,b,c,theIndexPt)
{
 //// console.log("checkingZbefore tile_"+a+"_"+b+"_"+c);
	if(a!=5||b!=30||c!=31)
	{
		mtlLoader.load( "tile_"+a+"_"+b+"_"+c+"_tex.mtl", function ( materials ) {



					materials.preload();


					var objLoader = new THREE.OBJLoader();
					objLoader.setMaterials( materials );
					objLoader.setPath(fullPath);
					objLoader.load( "tile_"+a+"_"+b+"_"+c+"_tex.obj", function ( object ) {
						console.log("yo yo loading tile_"+a+"_"+b+"_"+c);
                                                       //   storobj.push( object);               
						scene.add( object );


						var bbox = new THREE.Box3().setFromObject(object);
						gobalBBOX = bbox;
						
						
						theIndexPt.setLocationX((gobalBBOX.max.x+gobalBBOX.min.x)/2);
						theIndexPt.setLocationY((gobalBBOX.max.y+gobalBBOX.min.y)/2);
						
						theIndexPt.setLocationZ((gobalBBOX.max.z+gobalBBOX.min.z)/2);

						theIndexPt.setPic(object);//to remove the object
						noOfWork-=1;
						console.log("yo "+noOfWork);
						if(noOfWork==0)
						{
							for(var del=0;del<deleteArray.length;del++)
							{
								console.log("deleting")
								scene.remove(deleteArray[del]);
							}
							deleteArray=[];
						}

					}, onProgress, onError ); //end of obj

				}); //end of mtl
		
	}//end of if 
}



var startPoint = new mapTree(0, 0, 0,null,null);
var headLOD = startPoint;
var noOfWork=0;
console.log("yo "+noOfWork);
noOfWork=1;
console.log("yo "+noOfWork);
 abc(0,0,0,startPoint);

//action checking
document.getElementById("container").addEventListener("wheel", displayDate);
document.getElementById("container").addEventListener("mouseup", displayDate);
document.getElementById("container").addEventListener("mousedown", displayDate);
document.getElementById("container").addEventListener("touchend", displayDate );
document.getElementById("container").addEventListener("touchmove", displayDate );


				var oldCameraPostX = 0;
				var oldCameraPostY = 0;
				var oldCameraPostZ = 400;

function displayDate() { 
	
	 var cameraPtX =camera.position.x;
    var cameraPtY =camera.position.y;
    var cameraPtZ =camera.position.z;
    var storing =headLOD;
    var distnaceCheck = Math.sqrt(Math.pow((cameraPtX-oldCameraPostX),2)+Math.pow((cameraPtY-oldCameraPostY),2)+Math.pow((cameraPtZ-oldCameraPostZ),2));
    console.log(distnaceCheck);
    if(distnaceCheck>10)
    {
    oldCameraPostX = cameraPtX;
    oldCameraPostY = cameraPtY;
	oldCameraPostZ = cameraPtZ;

  	  if(noOfWork==0)
  	  {
  	  	console.log("yo check "+noOfWork);
  	  	console.log("yo check checkLODupper");
      checkLODupper(headLOD,cameraPtX, cameraPtY,cameraPtZ);
      }
      if(noOfWork==0)
  	  {
      console.log("yo check checkLODdeeper");
	  checkLODdeeper(headLOD,cameraPtX, cameraPtY,cameraPtZ);
	  }
	}
	 
	  
};
	 
function checkLODupper(head,cameraPtX, cameraPtY,cameraPtZ)
{//1
	var haveChange =false;
	console.log("checkLODupper");
	var currentNode =head;
	var beforeNode =null;
	while(currentNode!=null)
	{//2
		 //var checkNode=headLOD;
	 
		
		if(currentNode.master==true)
		{
			var theRange=0;
			if(currentNode.level==5)
			{//3
				theRange = 120;
			}
			else  if(currentNode.level==4)
			{
				theRange=190;
			}
			else if(currentNode.level==3)
			{
				theRange=260;
		
			}
			else if(currentNode.level==2)
			{
				theRange=330;
		
			}
			else if(currentNode.level==1)
			{
				theRange=400;
		
			}
			if(theRange!=0)
			{//4
				
				var distance = Math.sqrt(Math.pow((cameraPtX-currentNode.locationX),2)+Math.pow((cameraPtY-currentNode.locationY),2)+Math.pow((cameraPtZ-currentNode.locationZ),2));
				
   				if(distance>theRange)
				{

					console.log("yo upper "+distance+" > "+theRange+" "+currentNode.level+" "+currentNode.placeX+" "+currentNode.placeY);
					console.log();
					console.log(noOfWork);
					currentNode.upper(beforeNode,currentNode);
					haveChange=true;
					
        		}
        	
       		 }//4
		}
		///recent    console.log(currentNode.level+" "+currentNode.placeX+" "+currentNode.placeY);
		if(haveChange==false)
		{
			beforeNode=currentNode;
        	currentNode=currentNode.next;
        	console.log("1");
        }
        else
        {
        	if(beforeNode!=null)
        	{
        		currentNode=beforeNode.next;
        		beforeNode=beforeNode;
        		console.log("2");
        	}
        	else
        	{
        		currentNode=headLOD;
        		console.log("3");
        	}
        	haveChange=false;
        }
        /*var checking=headLOD;
        while(checking!=null)
        {
        	console.log(checking.level+" "+checking.placeX+" "+checking.placeY);
        	checking=checking.next;
        }
        console.log("end");*/
	}//2
	
};
function checkLODdeeper(head,cameraPtX, cameraPtY,cameraPtZ)
{//1
	var didSomething =false;
	console.log("checkLODdeeper");
	var currentNode =head;
	var beforeNode =null;
	var storeNode  = null;
	
	while(currentNode!=null)
	{//2
		 /*var checkNode=headLOD;
	  while(checkNode!=null)
   			{
   				console.log(checkNode.level+" "+checkNode.placeX+" "+checkNode.placeY);
   				checkNode=checkNode.next;
   			}*/
		if(currentNode.level!=5)
		{//3
			var theRange = 0;
			if(currentNode.level==4)
			{
				//theRange=30;
				theRange = 120;
			}
			else if(currentNode.level==3)
			{
				//theRange=80;
				theRange=190;
	
			}
			else if(currentNode.level==2)
			{
				//theRange=140;
				theRange=260;
		
			}
			else if(currentNode.level==1)
			{
				//theRange=200;
				theRange=330;
		
			}
			else if(currentNode.level==0)			
			{
				//theRange=270;
				theRange=400;
		
			}
		
			if(theRange!=0)
			{//4

				var distance = Math.sqrt(Math.pow((cameraPtX-currentNode.locationX),2)+Math.pow((cameraPtY-currentNode.locationY),2)+Math.pow((cameraPtZ-currentNode.locationZ),2));
				
   				if(distance<theRange)
				{	console.log("yo deeper "+currentNode.locationX+" "+currentNode.locationY+" "+currentNode.locationZ);
					console.log("yo deeper "+distance+" < "+theRange+" "+currentNode.level+" "+currentNode.placeX+" "+currentNode.placeY);
					console.log(noOfWork);
					storeNode = currentNode.deeper(beforeNode,currentNode);
					didSomething =true;
          	 		
        		}
        	
       		 }//4
        }//3
        
        if(didSomething ==false)
       	{
        	beforeNode=currentNode;
        	currentNode=currentNode.next;
        }
        else
        {
        	
        		beforeNode=storeNode;
        	 	storeNode.next=currentNode.next;
        	 	currentNode=currentNode.next;
        	 	didSomething=false;
        	

        }
        /*var passingPt=headLOD;
        console.log("yo yo headLOD");
			while(passingPt!=null)
			{
				console.log("yo yo "+passingPt.level+" "+passingPt.placeX+" "+passingPt.placeY);
				passingPt=passingPt.next;
			}
			console.log("yo yo headLOD");*/
		
	}//2
	
};//1


function mapTree (level, placeX, placeY,next,master) {
    this.level =level;
    this.placeX = placeX;
    this.placeY = placeY;
    this.locationX = 0;
    this.locationY = 0;
    this.locationZ = 0;
    this.next = next;
    this.master=master;
    this.objPic;

}

mapTree.prototype.setLocationX = function(setX) {
    this.locationX= setX;
};
mapTree.prototype.setLocationY = function(setY) {
    this.locationY= setY;
};
mapTree.prototype.setLocationZ = function(setZ) {
    this.locationZ= setZ;
};
mapTree.prototype.setPic = function(pic){
    this.objPic= pic;
};
mapTree.prototype.setNext = function(setNext) {
    this.next= setNext;
};

mapTree.prototype.getLocationX = function() {
    return this.locationX;
};
mapTree.prototype.getLocationY = function() {
    return this.locationY;
};

mapTree.prototype.getLocationZ = function() {
    return this.locationZ;
};


//deeper LOD
mapTree.prototype.deeper = function(beforeNode,theNode) {
	////REVERSE IT
		////REVERSE IT
			////REVERSE IT
				////REVERSE IT
	console.log("yo yo removing "+theNode.level+" "+theNode.placeX +" "+theNode.placeY);
	deleteArray.push(theNode.objPic);
	//scene.remove(theNode.objPic);
	var errorCount=0;
	var nextNode =theNode.next;
	var placeX = theNode.placeX;
	var placeY = theNode.placeY;
	var level =theNode.level;
	if(level==4)
	{
		addI=1;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;
		
	}
	else  if(level==3)
	{
		addI=2;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==2)
	{
		addI=4;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==1)
	{
		addI=8;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==0)
	{
		addI=16;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;
 	}
 
    var count=0; 
    console.log("yo");
    var storingList;
    var passingPointer;
  
    				noOfWork+=4;

    				console.log("yo passing"+noOfWork);
    		for(var yI=placeX;yI<=addMaxX;yI+=addI)
			{
      			for(var zI=placeY;zI<=addMaxY;zI+=addI)
     			{
     				console.log(count);
     				if(count==0)
     				{
     					var addingchild = new mapTree(level+1, yI, zI,null,true);

     					storingList=addingchild;
     					passingPointer=addingchild;
     				}
     				else
     				{
     					var addingchild = new mapTree(level+1, yI, zI,null,false);
     					passingPointer.next=addingchild;
     					passingPointer=addingchild;
     				}
     				
     				console.log("passing "+level+1+" "+yI+" "+zI);
     				
            			abc(level+1,yI,zI,addingchild);
     				
      				
            		
            		count++;
      			}
			}
			

			//passingPointer.next=nextNode; connect back
            		if(beforeNode==null)
           			{
            			headLOD=storingList;
            			
            		}
            		else
            		{
            			beforeNode.next=storingList;
            		
            		}
            		//changing the node pointer
            		beforeNode = addingchild;
            
            		//////do I need to delete the element?     
		 
			

		
 console.log("yo");
 return beforeNode;
}; 

//how to remove the 4child in the same time not only remove one of them
mapTree.prototype.upper = function(beforeNode,theNode) {
	  var done=false;
	 /* var checkNode=headLOD;
	  while(checkNode!=null)
   			{
   				console.log(checkNode.level+" "+checkNode.placeX+" "+checkNode.placeY);
   				checkNode=checkNode.next;
   			}*/
	
     		noOfWork+=1;	
     		console.log("yo "+noOfWork);
   var nextNode =theNode.next;
	var placeX = theNode.placeX;
	var placeY = theNode.placeY;
	var level =theNode.level;
	//should have better version
	var findNode = theNode;

	var findX;
	var findY;
	var checkMaster=0;
	
	if(level==5)
	{
		addI=1;
		findX=placeX+addI;
		findY=placeY+addI;
		while((!(findNode.level==level&&findNode.placeX==findX&&findNode.placeY==findY)))
 		{
 			console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY);
 			
 			deleteArray.push(findNode.objPic);
 			//scene.remove(findNode.objPic);
 			findNode=findNode.next;
 			
 		}
		
	}
	else if(level==4)
	{
		addI=2;
		findX=placeX+addI;
		findY=placeY+addI;
		var level5 = level+1;
		var find5X =findX+1;
		var find5Y= findY+1;
		var checkLevel = findNode.level;
		console.log(checkLevel);
		console.log(findNode.level);
		while((!(findNode.level==level&&findNode.placeX==findX&&findNode.placeY==findY))&&(!(findNode.level==level5&&findNode.placeX==find5X&&findNode.placeY==find5Y)))
 		{
 			console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY);
 			
 			deleteArray.push(findNode.objPic);
 			//scene.remove(findNode.objPic);
 			findNode=findNode.next;
 			
 		}

	}
	else if(level==3)
	{
		addI=4;
		findX=placeX+addI;
		findY=placeY+addI;
		var level4 = level+1;
		var find4X =findX+2;
		var find4Y= findY+2;
		var level5 = level+1+1;
		var find5X =findX+2+1;
		var find5Y= findY+2+1;
		var checkLevel = findNode.level;
		console.log(checkLevel);
		console.log(findNode.level);
		while((!(findNode.level==level&&findNode.placeX==findX&&findNode.placeY==findY))&& (!(findNode.level==level4&&findNode.placeX==find4X&&findNode.placeY==find4Y)) && (!(findNode.level==level5&&findNode.placeX==find5X&&findNode.placeY==find5Y)))
 		{
 			console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY);
 			
 			deleteArray.push(findNode.objPic);
 			//scene.remove(findNode.objPic);
 			findNode=findNode.next;
 			
 		}

	}
	else if(level==2)
	{
		addI=8;
		findX=placeX+addI;
		findY=placeY+addI;
		var level3 = level+1;
		var find3X =findX+4;
		var find3Y= findY+4;
		var level4 = level+1+1;
		var find4X =findX+4+2;
		var find4Y= findY+4+2;
		var level5 = level+1+1+1;
		var find5X =findX+4+2+1;
		var find5Y= findY+4+2+1;
		var checkLevel = findNode.level;
		
		while((!(findNode.level==level&&findNode.placeX==findX&&findNode.placeY==findY))&& (!(findNode.level==level3&&findNode.placeX==find3X&&findNode.placeY==find3Y))&& (!(findNode.level==level4&&findNode.placeX==find4X&&findNode.placeY==find4Y)) && (!(findNode.level==level5&&findNode.placeX==find5X&&findNode.placeY==find5Y)))
 		{
 			console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY);
 			
 			
 			deleteArray.push(findNode.objPic);
 			//scene.remove(findNode.objPic);
 			findNode=findNode.next;
 			
 		}

	}
	else if(level==1)
	{
		addI=16;
		findX=placeX+addI;
		findY=placeY+addI;
		var level2 = level+1;
		var find2X =findX+8;
		var find2Y= findY+8;
		var level3 = level+1+1;
		var find3X =findX+8+4;
		var find3Y= findY+8+4;
		var level4 = level+1+1+1;
		var find4X =findX+8+4+2;
		var find4Y= findY+8+4+2;
		var level5 = level+1+1+1+1;
		var find5X =findX+8+4+2+1;
		var find5Y= findY+8+4+2+1;
		var checkLevel = findNode.level;
		
		while((!(findNode.level==level&&findNode.placeX==findX&&findNode.placeY==findY))&&(!(findNode.level==level2&&findNode.placeX==find2X&&findNode.placeY==find2Y))&& (!(findNode.level==level3&&findNode.placeX==find3X&&findNode.placeY==find3Y))&& (!(findNode.level==level4&&findNode.placeX==find4X&&findNode.placeY==find4Y)) && (!(findNode.level==level5&&findNode.placeX==find5X&&findNode.placeY==find5Y)))
 		{
 			console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY);
 			
 			checkMaster+=findNode.placeX;
 			checkMaster+=findNode.placeY;
 			deleteArray.push(findNode.objPic);
 			//scene.remove(findNode.objPic);
 			findNode=findNode.next;
 			
 			
 		}

 	}
 	
 	deleteArray.push(findNode.objPic);
 	//scene.remove(findNode.objPic);
 	console.log("yo yo removing "+findNode.level+" "+findNode.placeX +" "+findNode.placeY+" "+findNode.next)
 	if((level==2&&(placeX==0)&&(placeY==0))||(level==3&&(placeX%16==0)&&(placeY%16==0))||(level==4&&(placeX%8==0)&&(placeY%8==0))||(level==5&&(placeX%4==0)&&(placeY%4==0)))
 		{
 			var addingchild = new mapTree(level-1, placeX, placeY,findNode.next,true);
 		}
 		else
 		{
 			var addingchild = new mapTree(level-1, placeX, placeY,findNode.next,false);
 		}
 	
 	findNode.next=null;
 	if(beforeNode==null)
            {
            	headLOD=addingchild;
            }
            else
            {
            	beforeNode.next=addingchild;	
            }
            /*var checkNode=headLOD;
   			while(checkNode!=null)
   			{
   				console.log(checkNode.level+" "+checkNode.placeX+" "+checkNode.placeY);
   				checkNode=checkNode.next;
   			}*/
    
     		//haveThingsDo=true;
 	 		abc(level-1,placeX,placeY,addingchild);
 	 		console.log("passing -1 "+level+" "+placeX+" "+placeY);
 	 		done=true;
 	 	
 	
};
  


///////////////////////////////////////////

///////////////////////////////////////////



///////////////////////////////////////////
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
				// renderer
				//I comment
				//renderer = new THREE.WebGLRenderer( { antialias: false } );
				////////////////////////////
				//I add
				var canvas1 = document.getElementById("canvas");
				renderer = new THREE.WebGLRenderer( { canvas:canvas1 } );
				////////////////////////////////
				renderer.setClearColor( scene.fog.color );
				renderer.setPixelRatio( window.devicePixelRatio );
				//I comment
				//renderer.setSize( window.innerWidth, window.innerHeight );
				////////////////////////////
				//I add
				renderer.setSize( 1024,768);
				////////////////////////////
				container = document.getElementById( 'container' );
				container.appendChild( renderer.domElement );
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
				render();
				controls.update();
				

			}
			function render() {
				
				renderer.render( scene, camera );
				stats.update();

			}


//////////////////////////////////////////////////////////
 










//////////////
		</script>
		
		</script>
		<!--end-->
		
   			<!--	</div>-->
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