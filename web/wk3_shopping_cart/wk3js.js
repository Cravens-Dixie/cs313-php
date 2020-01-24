var catan = {
    itemId: 1,
    game: "Settlers of Catan",
    itemPrice: 29.99
};



$("#myBtn").click(function(){
    var str = $("#myInput").val();

    $("#myDiv").css("background-color", str);
})


$("button").click(function() {
    var $itemId = $(this).attr("id");
    changeCart($itemId);
})


function changeCart(itemId) {
    sessionStorage.setItem(itemId, "True");
}

//Create a function to create a XMLHttpRequest object and return the text from a txt file (JSON_Text.txt)
function createXML() {
    //create a XMLHttpRequest object
    const myXML = new XMLHttpRequest();
    //check readystatechange for correct readyState and status
    myXML.onreadystatechange = function () {
        if (myXML.readyState == 4) {
            if (myXML.status == 200) {
                document.getElementById("getMethod").textContent = myXML.responseText;
            }
            if (myXML.status == 404) {
                document.getElementById("getMethod").textContent = "That file could not be found.";
            }
        }
    };
    //open the request and send it
    myXML.open('get', '/JSON_Text.txt', true);
    myXML.send();
}