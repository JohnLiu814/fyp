(function(){

	  // Get sign in elements
	  const txtEmail = document.getElementById('txtEmail');
	  const txtPassword = document.getElementById('txtPassword');
	  const btnLogin = document.getElementById('btnLogin');
	  const btnSignUp = document.getElementById('btnSignUp');
	  const btnLogout = document.getElementById('btnLogout');

	  // Add Login event
	  if(btnLogin){
	  	  btnLogin.addEventListener('click', e =>{
	  	// Get email and password
	  	const email = txtEmail.value;
	  	const pass = txtPassword.value;
	  	const auth = firebase.auth();
	  	// Sign in
	  	const promise = auth.signInWithEmailAndPassword(email, pass);
	 	promise.catch(e => console.log(e.message));

	  });
	 }

	 // Add signup event
	 if(btnSignUp){
	  	  btnSignUp.addEventListener('click', e =>{
	  	// Get email and password
	  	const email = txtEmail.value;
	  	const pass = txtPassword.value;
	  	const auth = firebase.auth();
	  	// Sign in
	  	const promise = auth.createUserWithEmailAndPassword(email, pass);
	 	promise.catch(e => console.log(e.message));

	  });
	}  	
	
	// Add log out event
	if(btnLogout){
		btnLogout.addEventListener('click', e => {
			firebase.auth().signOut();
		});
	}
	
	// Add a realtime listener
	firebase.auth().onAuthStateChanged(firebaseUser => {
		if(firebaseUser){
			console.log(firebaseUser);
			btnLogout.classList.remove('hide');
		} else{
			console.log('not logged in');
			btnLogout.classList.add('hide');
		}
	});

	//add value for button in loginreg form

}());