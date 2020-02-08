
document.getElementById("seeStudents").onclick = showStudents;
function showStudents() {
    const para = document.createElement("p");
    const node = document.createTextNode("Students:");
    let text = para.appendChild(node);
}