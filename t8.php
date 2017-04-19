<?php
	session_start();
	$halfPath = $_SESSION['halfPath'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<link rel="stylesheet" href="css/main.css">
		<title>three.js webgl - trackball controls</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<style>
			body {
				color: #000;
				font-family:Monospace;
				font-size:13px;
				text-align:center;
				font-weight: bold;
				background-color: #fff;
				margin: 0px;
				overflow: hidden;
			}
			#info {
				color:#000;
				position: absolute;
				top: 0px; width: 100%;
				padding: 5px;
			}
			a {
				color: red;
			}
		</style>
	</head>

	<body>
<div id = "t8div">
<button id="myBtn" onclick="window.location.href='./user.php'">Back To UserPage</button>
</div>
		<div id="container"></div>
		
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
			var fullPath =  "<?php echo $halfPath; ?>"
			if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
			var container, stats;
			var camera, controls, scene, renderer;
			var cross;
                                    var storobj=[];
			init();
			animate();
			var gobalBBOX;
			function init() {
				camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
                                              //  console.log();
//camera.zoom=3;
				camera.position.z = 300;
				camera.position.x = 100;
				camera.position.y = 100;
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
/*
			
				}
*/

var onProgress = function ( xhr ) {
					if ( xhr.lengthComputable ) {
						var percentComplete = xhr.loaded / xhr.total * 100;
					////	console.log( Math.round(percentComplete, 2) + '% downloaded' );
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
						console.log("checkingZ tile_"+a+"_"+b+"_"+c);
                                                         storobj.push( object);               
						scene.add( object );

						var bbox = new THREE.Box3().setFromObject(object);
						gobalBBOX = bbox;
						
						/*console.log(theIndexPt);
						console.log("haha5");*/
						theIndexPt.setLocationX((gobalBBOX.max.x+gobalBBOX.min.x)/2);
						theIndexPt.setLocationY((gobalBBOX.max.y+gobalBBOX.min.y)/2);
						/*console.log((gobalBBOX.max.y+gobalBBOX.min.y)/2);
						console.log(gobalBBOX.max.y);
						console.log(gobalBBOX.min.y);*/
						theIndexPt.setLocationZ((gobalBBOX.max.z+gobalBBOX.min.z)/2);
						theIndexPt.setmaxX(gobalBBOX.max.x);
						theIndexPt.setmaxY(gobalBBOX.max.y);
						theIndexPt.setmaxZ(gobalBBOX.max.z);
						theIndexPt.setminX(gobalBBOX.min.x);
						theIndexPt.setminY(gobalBBOX.min.y);
						theIndexPt.setminZ(gobalBBOX.min.z);
						theIndexPt.setPic(object);
						/*
						console.log(startPoint.findparent(startPoint,startPoint.getLocationX(),startPoint.getLocationY(),startPoint.getLocationZ()));*/
						////console.log("can?");

					}, onProgress, onError ); //end of obj

				}); //end of mtl
	}//end of if 
}




var startPoint = new mapTree(0, 0, 0,"tile_0_0_0_tex", null,null);
var headLOD = startPoint;
var linkedListLOD =1;
 abc(0,0,0,startPoint);

//action checking
document.getElementById("container").addEventListener("wheel", displayDate);
document.getElementById("container").addEventListener("mouseup", displayDate);
document.getElementById("container").addEventListener("mousedown", displayDate);
document.getElementById("container").addEventListener("touchstart", displayDate );
document.getElementById("container").addEventListener("touchend", displayDate );
document.getElementById("container").addEventListener("touchmove", displayDate );


function displayDate() { 
	
	 var cameraPtX =camera.position.x;
    var cameraPtY =camera.position.y;
    var cameraPtZ =camera.position.z;
    var storing =headLOD;
    console.log("look");
	while(storing!=null)
	{
		console.log(storing.level+" "+storing.placeX+" "+storing.placeY);
		storing=storing.next;
	}
	console.log("look");

	  checkLOD(headLOD,cameraPtX, cameraPtY,cameraPtZ);

	  	};
	 
	
function checkLOD(head,cameraPtX, cameraPtY,cameraPtZ)
{//1
	var currentNode =head;
	var beforeNode =null;
	
	while(currentNode!=null)
	{//2
		if(currentNode.level!=5)
		{//3
		var theRange = 0;
		if(currentNode.level==4)
		{
			theRange=50;
		
		}
	else if(currentNode.level==3)
		{
			theRange=160;
		
		}
	else if(currentNode.level==2)
		{
			theRange=190;
		
		}
	else if(currentNode.level==1)
		{
			theRange=220;
		
		}
	else if(currentNode.level==0)			
		{
			theRange=270;
		
		}
		
		if(theRange!=0)
		{//4
			console.log("checkingS "+currentNode.level==2);

			var distance = Math.sqrt(Math.pow((cameraPtX-currentNode.locationX),2)+Math.pow((cameraPtY-currentNode.locationY),2)+Math.pow((cameraPtZ-currentNode.locationZ),2));
			console.log("showing");
   			console.log(distance);
   			console.log("showing");
   			if(distance<theRange)
			{
				currentNode.deeper(beforeNode,currentNode);
          	 console.log("checkinga"+currentNode.level+" "+currentNode.placeX+" "+currentNode.placeY)
        	}
        	
        }//4
        }//3
        beforeNode=currentNode;
        currentNode=currentNode.next;
		
	}//2
};//1


function mapTree (level, placeX, placeY,parent,parentPT,next,before) {
    this.level =level;
    this.placeX = placeX;
    this.placeY = placeY;
    this.locationX = 0;
    this.locationY = 0;
    this.locationZ = 0;
    this.parent = parent;
    this.next = next;
    this.parentPT = parentPT;
    this.maxX= 0;
    this.maxY= 0;
    this.minX= 0;
    this.minY= 0;
    this.maxZ= 0;
    this.minZ= 0;
    this.finish = false;
    this.objPic;
    this.listener=true;
    this.inSideArr = false;

}
mapTree.prototype.setListener = function(set) {
    this.listener= set;
};
mapTree.prototype.showListener = function(set) {
    return this. listener;
};
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
mapTree.prototype.setmaxX = function(setX) {
    this.maxX= setX;
};
mapTree.prototype.setmaxY = function(setY) {
    this.maxY= setY;
};
mapTree.prototype.setmaxZ = function(setZ) {
    this.maxZ= setZ;
};

mapTree.prototype.setminX = function(setX) {
    this.minX= setX;
};
mapTree.prototype.setminY = function(setY) {
    this.minY= setY;
};
mapTree.prototype.setminZ = function(setZ) {
    this.minZ= setZ;
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

mapTree.prototype.deeper = function(beforeNode,theIndex) {
  scene.remove(theIndex.objPic);
};

//deeper LOD
mapTree.prototype.deeper = function(beforeNode,theNode) {
	console.log("see ",theNode.level,+" "+theNode.placeX+" "+theNode.placeY);
	var nextNode =theNode.next;
	var placeX = theNode.placeX;
	var placeY = theNode.placeY;
	var level =theNode.level;
	if(level==0)
	{
		addI=16;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;
		
	}
	else if(level==1)
	{
		addI=8;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==2)
	{
		addI=4;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==3)
	{
		addI=2;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;

	}
	else if(level==4)
	{
		addI=1;
		addMaxX=placeX+addI;
		addMaxY=placeY+addI;
 	}
 console.log("checkingb"+level+" "+placeX+" "+placeY)


    for(var yI=placeX;yI<=addMaxX;yI+=addI)
{
      for(var zI=placeY;zI<=addMaxY;zI+=addI)
     {
     
     		var addingchild = new mapTree(level+1, yI, zI,"tile_"+level+1+"_"+yI+"_"+zI+"_tex",theNode,nextNode);
     		
     		theNode.next=null;
            abc(level+1,yI,zI,addingchild);
            if(beforeNode==null)
            {
            	headLOD=addingchild;
            }
            else
            {
            	beforeNode.next=addingchild;	
            }
            //changing the node pointer
            beforeNode = addingchild;
            
            //////do I need to delete the element?

            console.log("checkingb2 "+level+1+" "+yI+" "+zI)
            
            
      }
}
}; 
//how to remove the 4child in the same time not only remove one of them
mapTree.prototype.upper = function(theNode) {
   if(parent!="tile_"+level+"_"+placeX+"_"+placeY+"_tex")
   {
   		scene.remove(theNode); 
   }
   else
   {
   		abc(level-1,placeX,placeY);
   		scene.remove(theNode); 
   }

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
				renderer = new THREE.WebGLRenderer( { antialias: false } );
				renderer.setClearColor( scene.fog.color );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
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

 	</body>
</html>