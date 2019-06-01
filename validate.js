function adultage(age){
	if(age< 13){
		alert("Adult age should be greater than 12");
		return false;
	
	}
}function childage(age){
	if(age> 12 && age <2){
		alert("Adult age should be between 2  and 12");
		return false;
	
	}
}function infantage(age){
	if(age> 2){
		alert("Adult age should be less than s2");
		return false;
	
	}
}


function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    // return age;
    alert(age);
}




function inputAlphabet(inputtext){
var alphaExp = /^[a-zA-Z]+$/;
if(inputtext.value.match(alphaExp)){
return true;
}else{
document.getElementById('p1').innerText = alertMsg;
inputtext.focus();
alert("wrong");
return false;
}
}