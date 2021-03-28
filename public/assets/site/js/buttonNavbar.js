if (!sessionStorage.getItem("email")) {
     document.getElementById('btnGuestList').style.display = 'block';
} else {
    document.getElementById("btnUserList").style.display = "block";
}