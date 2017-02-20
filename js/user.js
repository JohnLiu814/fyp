
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    document.getElementById("intro").style.display= 'block';
    document.getElementsByClassName("realintro")[0].style.display="none";
    document.getElementById("process").style.display= 'block';
    document.getElementsByClassName("realprocess")[0].style.display="none";
  } else {
    // No user is signed in.
     document.getElementById("intro").style.display= 'none';
  	 document.getElementsByClassName("realintro")[0].style.display="block";
  	 document.getElementById("process").style.display='none';
  	 document.getElementsByClassName("realprocess")[0].style.display="block";
  }
});


//Get elements
var uploader = document.getElementById('uploader');
var fileButton = document.getElementById('fileButton');








//Listen for file selection
/*fileButton.addEventListener('change',function(e){
	
	//get user's profile
	var user = firebase.auth().currentUser;
	var uid;

	//get file
	var file = e.target.files[0];

	//Creaate a storage ref
	var storageRef = firebase.storage().ref(user.uid+'/'+ file.name);

	//Upload file
	var task = storageRef.put(file);

	//Update progress bar
	 task.on('state_changed', 
		function progress(snapshot){
		var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
		uploader.value = percentage;

		},

		function error(err){

		},

		function complete(){

		}

	);

});*/
firebase.auth().onAuthStateChanged((user) => {
  if (user) {
    document.getElementById("hiddenUserId").value=user.uid;
  }
});

