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