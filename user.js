
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    document.getElementById("user").style.display = 'block';
  } else {
    // No user is signed in.
  }
});


//Get elements
var uploader = document.getElementById('uploader');
var fileButton = document.getElementById('fileButton');

//Listen for file selection
fileButton.addEventListener('change',function(e){
	//get file
	var file = e.target.files[0];

	//Creaate a storage ref
	var storageRef = firebase.storage().ref('model/'+ file.name);

	//Upload file
	storage.put(file);

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

});