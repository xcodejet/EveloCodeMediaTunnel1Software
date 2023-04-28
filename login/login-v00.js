
//* get data
let input_username = "Accessing"
let input_password = "Data..."
let about = "Loading about..."
let username = "Loading username..."
let profile_photo = "..."
let verified = ""
let APP_DATA = null
fetch('https://script.google.com/macros/s/AKfycbzz0jyknqpNnu4P1pXqW_jxeQbkcSJ8TeBnNsnnlzkazAGPOozYWBbAuUqfOrZnvx8/exec')
.then(res => res.json())
.then(data => {
    APP_DATA = data
    username = APP_DATA.content[1][0]
    if(APP_DATA.content[1][10]){
        profile_photo = APP_DATA.content[1][10]
    }else{
        profile_photo = "./System/no-profile-image.png"
    }
    verified = APP_DATA.content[1][14]
})
const logIn = ( ) => {
    input_username = document.getElementById("username").value
    input_password = document.getElementById("password").value
    console.log("loging")
    checkLogin()
}
let accountId = 0
const checkLogin = () => {
    if(APP_DATA.content[accountId][0] === input_username){
        if(APP_DATA.content[accountId][1] === input_password){
            window.open("http://localhost/ArtwebAndroid/index.html?evelocodeid=AE06C52S"+accountId+"2C06E52R","_self")
        }else{
            document.getElementsByClassName("login-box-register")[0].style.display = "none"
            document.getElementById("error").style.display = "flex"
        }
    }else{
        accountId++
        checkLogin()
    }
}