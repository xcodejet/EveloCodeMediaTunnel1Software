let locationUrl1 = location.href
locationUrl1 = new URL(locationUrl1)
let userID1 = 1
userID1 = locationUrl1.searchParams.get("evelocodeid").slice(8,locationUrl.searchParams.get("evelocodeid").length-8)
userID1 = Number(userID1)


let Theme_BG = "#FFF"
let Setting_Box_BG ="#FFF"
let Setting_Box_Shadow ="00 2px 10px rgb(219, 219, 219)"
let Item_Box_BG = "#FFF"
let Item_Box_Shadow = "00 2px 10px rgb(219, 219, 219)"
let Item_Title = "#000"
let User_DP_Radius = "25px"
let cssFile = `body{background-color: ${Theme_BG};}.settings-box{background-color: ${Setting_Box_BG};box-shadow: ${Setting_Box_Shadow};}.box{background-color: ${Item_Box_BG};box-shadow: ${Item_Box_Shadow};}.box-footer-text h1{color: ${Item_Title};}.box-footer-img img {border-radius: ${User_DP_Radius};}.header-back img {border-radius: ${User_DP_Radius};}`
const changeColorValue = (Element,ecButton) => {
    switch(Element){
        case 'Theme BG' :
            //document.getElementsByTagName("BODY")[0].style.backgroundColor = ecButton.value
            Theme_BG = ecButton.value
        break
        case 'Setting Box BG' :
            var boxes = document.getElementsByClassName("settings-box")
            for(var i = 0; i<boxes.length; i++){
                //boxes[i].style.backgroundColor = ecButton.value
            }
            Setting_Box_BG = ecButton.value
        break
        case 'Setting Box Shadow' :
            var boxes = document.getElementsByClassName("settings-box")
            for(var i = 0; i<boxes.length; i++){
                boxes[i].style.boxShadow = "00 2px 10px" + ecButton.value
            }
            Setting_Box_BG = "00 2px 10px" + ecButton.value
        break
        case 'Item Box BG' :
            var boxes = document.getElementsByClassName("box")
            for(var i = 0; i<boxes.length; i++){
                //boxes[i].style.backgroundColor = ecButton.value
            }
            Item_Box_BG = ecButton.value
        break
        case 'Item Box Shadow' :
            var boxes = document.getElementsByClassName("box")
            for(var i = 0; i<boxes.length; i++){
                //boxes[i].style.boxShadow = "00 2px 10px" + ecButton.value
            }
            Item_Box_Shadow = "00 2px 10px" + ecButton.value
        break
        case 'Item Title' :
            var item = document.getElementsByClassName("box-footer-text")
            for(var i = 0; i<item.length; i++){
                //item[i].style.color = ecButton.value
            }
            Item_Title = ecButton.value
        break
        case 'User DP Radius' :
            //document.getElementsByTagName("BODY")[0].style.backgroundColor = ecButton.value
            User_DP_Radius = ecButton.value + "px"
        break
    }
    saveStyle()
}
//* create class for custom styling
const saveStyle = () => {
    /*var cssFile = `body {
        background-color: ${Theme_BG};
    }
    .settings-box {
        background-color: ${Setting_Box_BG};
        box-shadow: ${Setting_Box_Shadow};
    }
    .box{
        background-color: ${Item_Box_BG};
        box-shadow: ${Item_Box_Shadow};
    }
    .box-footer-text h1 {
        color: ${Item_Title};
    }
    .box-footer-img img {
        border-radius: ${User_DP_Radius};
    }
    .header-back img {
        border-radius: ${User_DP_Radius};
    }`*/
    cssFile = `body{background-color: ${Theme_BG};}.settings-box{background-color: ${Setting_Box_BG};box-shadow: ${Setting_Box_Shadow};}.box{background-color: ${Item_Box_BG};box-shadow: ${Item_Box_Shadow};}.box-footer-text h1{color: ${Item_Title};}.box-footer-img img {border-radius: ${User_DP_Radius};}.header-back img {border-radius: ${User_DP_Radius};}`
    document.getElementById("custom-style").innerHTML = cssFile

    //* button reset
    var button = document.getElementById("save-button")
    button.style.backgroundColor = "rgb(67, 67, 255)"
    button.innerHTML = "SAVE CHANGES"
}

//* add in database
const saveCustomStyles = (button) => {
    HIDDEN_FORM = document.getElementById('hidden-settings')
    document.getElementById('data-cell-no').value = "Q" + `${userID1+1}`
    document.getElementById('data-cell-data').value = cssFile
    
    if(document.getElementById('data-type').value === "update"){
        var ACCOUNT_DATA = new FormData(HIDDEN_FORM)
        fetch('https://script.google.com/macros/s/AKfycbzz0jyknqpNnu4P1pXqW_jxeQbkcSJ8TeBnNsnnlzkazAGPOozYWBbAuUqfOrZnvx8/exec', {
            method: "POST",
            body: ACCOUNT_DATA
        })
        .then(res => res.text())
        .then(ACCOUNT_DATA => console.log(ACCOUNT_DATA))
    }

    //* button diable
    button.style.backgroundColor = "#1F1"
    button.innerHTML = "SAVED"
    //document.getElementsByClassName("box-body-footer-next-btn-create")[0].style.display = "flex"

}