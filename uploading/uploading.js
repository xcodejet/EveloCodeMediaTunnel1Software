const uploadMediaType = (type,button) => {
    var page = document.getElementsByClassName("setting-list-item")
    var button = document.getElementsByClassName("userdetails-list")
    if(type === "image"){
        page[0].style.display = "flex"
        page[1].style.display = "none"
        page[2].style.display = "none"
        button[3].style.backgroundColor = "yellow"
        button[4].style.backgroundColor = "white"
        button[5].style.backgroundColor = "white"
    }
    if(type === "video"){
        page[1].style.display = "flex"
        page[0].style.display = "none"
        page[2].style.display = "none"
        button[4].style.backgroundColor = "yellow"
        button[3].style.backgroundColor = "white"
        button[5].style.backgroundColor = "white"
    }
    if(type === "audio"){
        page[2].style.display = "flex"
        page[1].style.display = "none"
        page[0].style.display = "none"
        button[5].style.backgroundColor = "yellow"
        button[4].style.backgroundColor = "white"
        button[3].style.backgroundColor = "white"
    }
}

upload_image_file.onchange = function(){
    var files = this.files
    var file = URL.createObjectURL(files[0])
    //upload_image_file_play.src = file
    document.getElementById("upload_image_file_play").src = file
}
upload_video_file.onchange = function(){
    var files = this.files
    var file = URL.createObjectURL(files[0])
    upload_video_file_play.src = file
    upload_video_file_play.play()
    //document.getElementById("upload_audio_file_play").src = file;
}
upload_audio_file.onchange = function(){
    var files = this.files
    var file = URL.createObjectURL(files[0])
    upload_audio_file_play.src = file
    upload_audio_file_play.play()
    //document.getElementById("upload_audio_file_play").src = file;
}


let locationUrl1 = location.href
locationUrl1 = new URL(locationUrl1)
let userID1 = 1
userID1 = locationUrl1.searchParams.get("evelocodeid").slice(8,locationUrl.searchParams.get("evelocodeid").length-8)
userID1 = Number(userID1)

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