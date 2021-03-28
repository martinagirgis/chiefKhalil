
function validatePassword(){
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirmPassword");

  if(password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Passwords Don't Match");
  } else {
    confirmPassword.setCustomValidity('');
  }
}


function uniqueEmail() {    
    //console.log( document.getElementById("email1").textContent);
    findUserEmail(document.getElementById("email1").value ,function (result) {
        let flag = false
        if(result[0])
        {
            $("#email1")[0].setCustomValidity("هذا البريد الالكتروني موجود بالفعل");
            console.log("if condition");
            $("#email1")[0].reportValidity();
            flag = false
            document.getElementById("next1").style.disabled = true;
            //callBack(flag)
        }
        else
        {
            $("#email1")[0].setCustomValidity("");
            console.log("else");
            flag = true
            document.getElementById("next1").style.disabled = false;
            //callBack(flag)
        }
},function (error) {
    console.log("fail");
})
}

// function validFile() {
//     if (!document.getElementById("FileUpload1").checkValidity()) {
//       document.getElementById("file").style.display = "block";
//     }
//     else
//     {
//         document.getElementById("file").style.display = "none";   
//     }
// }

function nextStep() {
    validatePassword();
    //validFile();
    sessionStorage.setItem('firstName', document.getElementById("account_first_name").value);
    sessionStorage.setItem('lastName',document.getElementById("account_last_name").value);
    sessionStorage.setItem('gender',document.getElementById("gender").value);
    sessionStorage.setItem('email',document.getElementById("email1").value);
    sessionStorage.setItem('mobile',document.getElementById("account_phone").value);
    sessionStorage.setItem('country',document.getElementById("input-country").value);
    // sessionStorage.setItem('password',document.getElementById("password").value);
    // sessionStorage.setItem('photo',document.getElementById("FileUpload1").value);
    sessionStorage.setItem('scope',"user");
    // location.href = "packages.html";\
}
//validatePassword();
            // validFile();
            // sessionStorage.setItem('firstName', document.getElementById("account_first_name").value);
            // sessionStorage.setItem('lastName',document.getElementById("account_last_name").value);
            // sessionStorage.setItem('gender',document.getElementById("gender").value);
            // sessionStorage.setItem('email',document.getElementById("email1").value);
            // sessionStorage.setItem('mobile',document.getElementById("account_phone").value);
            // sessionStorage.setItem('country',document.getElementById("input-country").value);
            // sessionStorage.setItem('password',document.getElementById("password").value);
            // // sessionStorage.setItem('photo',document.getElementById("FileUpload1").value);
            // sessionStorage.setItem('scope',"user");
            // // location.href = "packages.html";\

// let register = ()=>{
//     uniqueEmail((flag)=>{
//         if (flag) {
            
//             return true;
//         }
//         else
//         {
//             console.log("flag= false");
//             return false;
//         }
//     })
// }

function customValidate(flag){
    

}

function packagesYear(){
    sessionStorage.setItem('subscribe', "year");
    sessionStorage.setItem('amount',document.getElementById("amount_year").textContent);
}

function packagesMounth(){
    sessionStorage.setItem('subscribe', "mounth");
    sessionStorage.setItem('amount',document.getElementById("amount_mounth").textContent);
}

function paymrnt(){
    if(sessionStorage.getItem("subscribe")=="mounth"){
        document.getElementById('type').innerHTML = "شهرياً";
        document.getElementById('amount').innerHTML = sessionStorage.getItem("amount");
        sessionStorage.setItem('endDate', getYYYYMMDD(timeAfteMounth).toString() );
    }
    else if(sessionStorage.getItem("subscribe")=="year")
    {
        document.getElementById('type').innerHTML = "سنوياً";
        document.getElementById('amount').innerHTML = sessionStorage.getItem("amount");
        sessionStorage.setItem('endDate', getYYYYMMDD(timeAfterYear) );
    }
}


function signup(){
    console.log("signUp");
    var user = {
        mobile: sessionStorage.getItem("mobile"),
        email: sessionStorage.getItem("email"),
        firstName: sessionStorage.getItem("firstName"),
        lastName: sessionStorage.getItem("lastName"),
        password: sessionStorage.getItem("password"),
        country: sessionStorage.getItem("country"),
        gender: sessionStorage.getItem("gender"),
        scope: sessionStorage.getItem("scope"),
        // photo: sessionStorage.getItem("photo"),
    }
    addUser(user ,function (result) {
    var Payment = {
        id: sessionStorage.getItem("payer_id"),
        date: getYYYYMMDD(Date.now()),
        desc: sessionStorage.getItem("subscribe"),
        amount: sessionStorage.getItem("amount"),
        currency: "USD",
        userEmail: sessionStorage.getItem("email"),
    }
    addPayment(Payment,function (result) {
        var subscribe ={
            id: sessionStorage.getItem("payer_id"),
            userEmail: sessionStorage.getItem("email"), // with user email
            subscribe: sessionStorage.getItem("subscribe"), //annual or monthly
            enddDate: sessionStorage.getItem("endDate"),
        }
        addSubscribePackage(subscribe ,function (result) {
            console.log("success all");
            firebase.auth().createUserWithEmailAndPassword(sessionStorage.getItem("email"), sessionStorage.getItem("password"))
            .then((user) => {
                console.log("auth success");
                goIndexPage();
            })
            .catch((error) => {
                var errorCode = error.code;
                var errorMessage = error.message;
                // ..
            });
            },function (error) {
                console.log("fail");
            })
        },function (error) {
            console.log("fail");
        })
    },function (error) {
        console.log("fail");
    })
}
var timeAfteMounth = new Date();
timeAfteMounth.setDate(timeAfteMounth.getDate()+30);

var timeAfterYear = new Date();
timeAfterYear.setDate(timeAfterYear.getDate()+365);

function getYYYYMMDD(d0) {
    const d = new Date(d0)
    return new Date(d.getTime() - d.getTimezoneOffset() * 60 * 1000).toISOString().split('T')[0];
}

function goIndexPage(){
    location.href = "student/dashboard.html";
}
