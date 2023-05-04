//Get login
let locationUrl = location.href
locationUrl = new URL(locationUrl)
let userID = 1
if(locationUrl.search){
    userID = locationUrl.searchParams.get("evelocodeid").slice(8,locationUrl.searchParams.get("evelocodeid").length-8)
}else{
    userID = 1
}
//* get data
let first_name = "Accessing"
let last_name = "Data..."
let about = "Loading about..."
let username = "Loading username..."
let profile_photo = "..."
let verified = ""
let customStyle = ""
let APP_DATA = null
fetch('https://script.google.com/macros/s/AKfycbzz0jyknqpNnu4P1pXqW_jxeQbkcSJ8TeBnNsnnlzkazAGPOozYWBbAuUqfOrZnvx8/exec')
.then(res => res.json())
.then(data => {
    APP_DATA = data
    first_name = APP_DATA.content[userID][2]
    last_name = APP_DATA.content[userID][3]
    about = APP_DATA.content[userID][9]
    username = APP_DATA.content[userID][0]
    customStyle = APP_DATA.content[userID][16]
    if(APP_DATA.content[userID][10]){
        profile_photo = APP_DATA.content[userID][10]
    }else{
        profile_photo = "./System/no-profile-image.png"
    }
    verified = APP_DATA.content[userID][14]
    appendData(userID)
})
//APP_DATA = APP_DATA.content


function getdata(){

}
let verified_icon = ""
const appendData = (userID) => {
    if(verified === "verified"){
        verified_icon = "<img class='verified-icon' draggable='false' src='./System/verified.png'>"
    }
    document.getElementById('profile-1').src = profile_photo
    document.getElementById('icon').href = profile_photo
    document.getElementsByClassName("settings-dp")[0].src = profile_photo
    document.getElementById('title').innerHTML = first_name + " | Safe Story | Settings"
    if(last_name === "Signed in"){
        document.getElementById('title').innerHTML = "EveloCode | Safe Story"
        document.getElementById('icon').href = "./System/icon.jpg"
    }
    document.getElementsByClassName("settings-name")[0].innerHTML = `
    <h2>${first_name+" "+last_name + " " + verified_icon}</h2>
    <h3>${about}</h3>
    <h4>@${username}</h4>`
    var LOVERS = document.getElementsByClassName("userdetails-list-item-a")[0]
    var LOVING = document.getElementsByClassName("userdetails-list-item-a")[1]
    var UPLOADS = document.getElementsByClassName("userdetails-list-item-a")[2]
    LOVERS.innerHTML = APP_DATA.content[userID][11] + "<br> Lovers"
    LOVING.innerHTML = APP_DATA.content[userID][12] + "<br> Loving"
    UPLOADS.innerHTML = APP_DATA.content[userID][13] + "<br> Uploads"
    document.getElementById("custom-style").innerHTML = customStyle
    //*loading page close
    var loadingContainer = document.querySelector(".loading-container")
    loadingContainer.style.display = "none"

}
const addProfileImg1 = (element) => {
    //element.src = 
    document.getElementById('profile-1').src = "./System/no-profile-image.png"
    document.getElementsByClassName("settings-dp")[0].src = "./System/no-profile-image.png"
}
//getdata()
addProfileImg1()