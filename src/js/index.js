var web_desc = document.querySelector(".web-desc")
var local_desc = document.querySelector(".local-desc")
var text_area = document.getElementById("message")
var btn = document.querySelector("button")
var btn_text = document.querySelector("button span")
var btn_loader = document.querySelector("button div")
var success = document.querySelector(".success-mssg")
var failed = document.querySelector(".failed-mssg")


if(getComputedStyle(local_desc).display == "none"){
    function web(self) {
        self.style.borderBottom = "2px solid #fff"
        self.nextElementSibling.style.borderBottom = "0"
        local_desc.style.display = "none"
        web_desc.style.display = "block"
    }
    function local(self) {
        self.style.borderBottom = "2px solid #fff"
        self.previousElementSibling.style.borderBottom = "0"
        web_desc.style.display = "none"
        local_desc.style.display = "block"
    }
}

function suggest(self) {
    message.value = self.innerText
}

function direct(self, ev) {
    ev.preventDefault();

    var name = document.getElementById("name").value
    var email = document.getElementById("email").value
    var message = document.getElementById("message").value

    var url = "name=" + name + "&email=" + email + "&message=" + message;

    if(window.XMLHttpRequest){
        ajax_request = new XMLHttpRequest;
    }else{
        ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_request.upload.addEventListener("progress", progressHandler, false);
    ajax_request.addEventListener("load", completeHandler, false)
    ajax_request.open("POST", "php/contact.php", true);
    ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajax_request.send(url);
}

function progressHandler(ev) {
    btn_text.style.display = "none"
    btn_loader.style.display = "block"
    btn.setAttribute("disabled", "disabled");
}

function completeHandler(ev) {
    btn_loader.style.display = "none"
    btn_text.style.display = "block"
    btn.removeAttribute("disabled")
    var result = ev.target.responseText

    if(result === "done") {
        success.style.display = "block"
        failed.style.display = "none"
    }else{
        failed.style.display = "block"
        success.style.display = "none"
    }
}