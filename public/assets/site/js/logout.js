function logOut()
{
    firebase.auth().signOut()
        .then(function () {
          window.location="../index.html"; 
          sessionStorage.clear();        
        }).catch(function (error) {
    });
    
}