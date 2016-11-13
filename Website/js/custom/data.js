var scene, camera, renderer;

var WIDTH = document.getElementById('three-container').offsetWidth;
var HEIGHT = document.getElementById('three-container').offsetHeight;

var SPEED = 0.01;
var cells = [];

var SCENE_WIDTH = 20;
var SCENE_HEIGHT = 20;

function initCamera(){
    camera = new THREE.PerspectiveCamera(45, WIDTH / HEIGHT, 1, 150);
    camera.position.set(14, 8, 19);
    camera.lookAt(new THREE.Vector3(10, 1, 10));
}

function initRenderer(){
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(WIDTH, HEIGHT);
}

function renderScene(sceneMatrix){
    var sceneWidth = sceneMatrix[1].length;
    var sceneHeight = sceneMatrix.length;
    var matrixEmpty = true;

    for(var i = 1; i < sceneWidth; i++) {
        for (var j = 1; j < sceneHeight; j++) {
            if(sceneMatrix[i][j] === 1) {
                matrixEmpty = false;
                var plate = new THREE.Mesh(new THREE.BoxGeometry(2,0.1,2), new THREE.MeshNormalMaterial());
                plate.position.setX(-6.5 + (2 * i));
                plate.position.setY(0);
                plate.position.setZ(-8 + (2 * j));
                scene.add(plate);
            }
        }
    }

    if(matrixEmpty === true) {
        /* Hack! */
        for(var i = 1; i < 10; i++){
            clearScene();
        }
    }
}

function clearScene(){
    scene.children.forEach(function(object){
        scene.remove(object);
    });
}

function gridHandler() {
    if(this.className.includes('gridActive')){
        this.className = "input_button";
        var numbers = extractXY(this.id);
        cells[numbers[0]][numbers[1]] = 0;
    } else {
        this.className += " gridActive";
    }
}

function visualise(){
    var elements = getElementsStartsWithId("input");
    for(var i = 1; i < elements.length; i++) {
        if(elements[i].className.includes('gridActive')) {
            var numbers = extractXY(elements[i]);
            var x = numbers[0];
            var y = numbers[1];
            cells[x][y] = 1;
        }
    }
    renderScene(cells);
}

function extractXY(element){
    var info = element.id.replace("input","");
    var numbers = info.split("+");
    return numbers;
}

function resetGrid() {
    var elements = getElementsStartsWithId('input');
    for(var i = 1; i < elements.length; i++) {
        elements[i].className = "input_button";
    }

    for(var x = 1; x < cells[1].length; x++) {
        for(var y = 1; y < cells[1].length; y++) {
            cells[x][y] = 0;
        }
    }
    renderScene(cells);
}

function getElementsStartsWithId( id ) {
    var children = document.body.getElementsByTagName('*');
    var elements = [], child;
    for (var i = 0, length = children.length; i < length; i++) {
        child = children[i];
        if (child.id.substr(0, id.length) == id)
            elements.push(child);
    }
    return elements;
}

function rotateScene(){

}

function generateInputs(){
    var appendPoint = document.getElementById("input-container");

    for(var i = 1; i <= 10; i++) {
        cells[i] = new Array(10);
        for(var j = 1; j <= 10; j++) {
            cells[i][j] = 0;
            var input = document.createElement("div");
            input.setAttribute("id", "input" + i + "+" + j);
            input.setAttribute("class", "input_button");
            input.addEventListener('click', gridHandler, false);
            appendPoint.appendChild(input);
        }
    }
}

function render(){
    requestAnimationFrame(render);
    rotateScene();
    renderer.render(scene, camera);
}

function init(){
    scene = new THREE.Scene();
    generateInputs();
    initCamera();
    initRenderer();
    renderScene(cells);

    document.getElementById('three-container').appendChild(renderer.domElement);
}

init();
render();