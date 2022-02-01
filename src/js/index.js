var web_desc = document.querySelector(".web-desc")
var local_desc = document.querySelector(".local-desc")
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