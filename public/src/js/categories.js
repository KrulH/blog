var docReady = setInterval(function(){
    if(document.readyState !== "complete") {
        return;
    }
    clearInterval(docReady);
    //...
    document.getElementsByClassName('btn')[0].addEventListener('click', createNewCategory);
}, 100);

function createNewCategory(event) {
    event.preventDefault();
    var name = event.target.previousElementSibling.value;
    if(name.length === 0) {
        alert('Please enter a valid category name');
        return;
    }
    ajax("POST","/admin/blog/category/create", "name=" + name, newCategoryCreated, [name]);

}
function newCategoryCreated(params, success, responseObj) {
    var name = params[0];
    location.reload();
}
function ajax(method,url,params,callback,callbackParams){
    var http;
    if (window.XMLHttpRequest){
        http = new XMLHttpRequest();
    } else {
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }

    http.onreadystatechange = function() {
        if (http.readyState == XMLHttpRequest.DONE ) {
            if(http.status == 200){
                var obj = JSON.parse(http.responseText);
                callback(callbackParams, true, obj);
            }
            else if(http.status == 400) {
                alert("Category could not be saved. Please try again!");
                callback(callbackParams, false);

            }
            else {
                var obj = JSON.parse(http.responseText);
                if (obj.message) {
                    alert(obj.message);
                } else {
                    alert("Please check the name");
                }
                callback(callbackParams, false);
            }
        }
    };
    http.open(method, baseUrl + url, true);
    http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    http.send(params + "&_token=" + token);
}