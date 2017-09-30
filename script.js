function showJDoodleEngine(id) {
    const topEngineWindowPadding = 30;
    const otherTopPadding = 4*2 + 5*2 + 14 + 2*3 + 10;

    let elementId = "jdoodle_embed_container" + id;
    let elemOnline = document.getElementById(elementId);
    elemOnline.style.visibility = "visible";

    let windowHeight = window.innerHeight;
    let maxEngineWindowHeight = windowHeight - 2 * topEngineWindowPadding - otherTopPadding;
    let embeddedEngineWindow = document.querySelector("#" + elementId + " .doodle_embed_scrollable"); 
    embeddedEngineWindow.style.maxHeight = maxEngineWindowHeight.toString() +"px";
}

function hideJDoodleEngine(id) {
    let elemOnline = document.getElementById("jdoodle_embed_container" + id);
    elemOnline.style.visibility = "hidden";
}
