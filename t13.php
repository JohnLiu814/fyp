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
			 /*#myBtn
                        {
                             width:49%;
							float:left;
							margin-right:5px;

                        }
                        #myBtn1
                         {
                             width:49%;
							float:right;

                        }*/
		</style>
	</head>

	<body>
<div id = "t8div">
<button id="myBt" onclick="window.location.href='./user.php'">Back To UserPage</button>
<button id="myBtn" >ZOOM</button>
<button id="myBtn1" >ZOOM OUT</button>
<button id="abc" >Start/Stop Rotation</button>
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
			init();
			animate();
			var gobalBBOX;
			var deleteArray=[];
			function init() {
				camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
                                              //  console.log();
//camera.zoom=3;
				camera.position.z = 400;
				camera.position.x = 0;
				camera.position.y = 0;
				controls = new THREE.TrackballControls( camera );
				controls.rotateSpeed = 20.0;
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
document.getElementById("myBtn").addEventListener("click", zoomplay);
document.getElementById("myBtn1").addEventListener("click", zoomplay1);
document.getElementById("abc").addEventListener("click", anim );



				var oldCameraPostX = 0;
				var oldCameraPostY = 0;
				var oldCameraPostZ = 400;
function anim()
{
   if(k==false)
   {
      
      k=true;
   }

   else if(k==true)
   {
      k=false;
      camera.position=scene.psition;
   }

}

function zoomplay1() { 

       camera.position.x+=camera.position.x*0.15; 
        camera.position.y+=camera.position.y*0.15;
         camera.position.z+=camera.position.z*0.15;
	
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






function zoomplay() { 

          camera.position.x-=camera.position.x*0.15; 
        camera.position.y-=camera.position.y*0.15;
         camera.position.z-=camera.position.z*0.15;
	
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
			/*function render() {
				
				renderer.render( scene, camera );
				stats.update();

			}*/

			var k=false;
			
            function render() {
				if(k==false)
                                {
				renderer.render( scene, camera );
				stats.update();
                                }
                                if(k==true)
                                {
                                    var timer = Date.now() * 0.0005;

                                   camera.position.y = Math.cos( timer ) * 100;
                                   camera.position.x = Math.sin( timer ) * 100;
                                   camera.lookAt( scene.position );

                                   renderer.render( scene, camera );

                                 }
			}


//////////////////////////////////////////////////////////
 










//////////////
		</script>

 	</body>
</html>