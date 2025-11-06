import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

// Khởi tạo scene, camera, renderer
const canvas = document.querySelector('#c');
const renderer = new THREE.WebGLRenderer({ canvas, antialias: true });
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

const scene = new THREE.Scene();
scene.background = new THREE.Color(0xf5f7fa);

const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(0, 6, 14);

// OrbitControls
const controls = new OrbitControls(camera, canvas);
controls.enableDamping = true;
controls.dampingFactor = 0.05;
controls.target.set(0, 0, 0);
controls.minDistance = 5;
controls.maxDistance = 25;

// Ánh sáng
const ambientLight = new THREE.AmbientLight(0xffffff, 0.7);
scene.add(ambientLight);

const mainLight = new THREE.DirectionalLight(0xffffff, 0.8);
mainLight.position.set(10, 12, 8);
mainLight.castShadow = true;
mainLight.shadow.mapSize.width = 2048;
mainLight.shadow.mapSize.height = 2048;
scene.add(mainLight);

const fillLight = new THREE.DirectionalLight(0xffffff, 0.4);
fillLight.position.set(-6, 4, -6);
scene.add(fillLight);

// Vật liệu
const puMaterial = new THREE.MeshPhongMaterial({
    color: 0xe8c870, // Vàng PU
    shininess: 18,
    specular: 0x444444
});

const foamMaterial = new THREE.MeshPhongMaterial({
    color: 0x1a1a1a, // Đen foam
    shininess: 5,
    specular: 0x111111
});

const pipeMaterial = new THREE.MeshStandardMaterial({
    color: 0xc94f3d, // Đỏ ống
    metalness: 0.3,
    roughness: 0.6
});

const metalBandMaterial = new THREE.MeshStandardMaterial({
    color: 0xd0d0d0, // Bạc kim loại
    metalness: 0.9,
    roughness: 0.2
});

// Hàm tạo text sprite (chú thích)
function createTextLabel(text, size = 0.3, color = '#333333', bgColor = 'rgba(255,255,255,0.9)') {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const font = `bold ${size * 100}px Arial`;
    context.font = font;
    const textWidth = context.measureText(text).width;

    canvas.width = textWidth + 40; // padding
    canvas.height = size * 100 + 30; // padding

    // Background
    context.fillStyle = bgColor;
    context.fillRect(0, 0, canvas.width, canvas.height);

    // Border
    context.strokeStyle = '#cccccc';
    context.lineWidth = 3;
    context.strokeRect(5, 5, canvas.width - 10, canvas.height - 10);

    // Text
    context.fillStyle = color;
    context.font = font;
    context.textAlign = 'center';
    context.textBaseline = 'middle';
    context.fillText(text, canvas.width / 2, canvas.height / 2);

    const texture = new THREE.CanvasTexture(canvas);
    const spriteMaterial = new THREE.SpriteMaterial({ map: texture });
    const sprite = new THREE.Sprite(spriteMaterial);
    sprite.scale.set(canvas.width / 100, canvas.height / 100, 1);

    return sprite;
}


// *** MỚI: Hàm tạo gối đỡ vuông (2 mảnh - trên/dưới) ***
// Gối đỡ lai: nửa dưới vuông kín, nửa trên tròn có lỗ (chỉ PU)
        function createSquareSupport(pipeRadius, width, depth) {
            const group = new THREE.Group();
            const puThickness = 0.3; // Độ dày mỏng hơn

            // NỬA DƯỚI VUÔNG - Lớp PU ĐẶC KHÔNG CÓ LỖ (kín)
            const puUShapeBottom = new THREE.Shape();
            
            // Vẽ hình chữ U đặc kín
            puUShapeBottom.absarc(0, 0, pipeRadius + puThickness, Math.PI, 0, true);
            puUShapeBottom.lineTo(pipeRadius + puThickness, -pipeRadius - puThickness - puThickness);
            puUShapeBottom.lineTo(-(pipeRadius + puThickness), -pipeRadius - puThickness - puThickness);
            puUShapeBottom.lineTo(-(pipeRadius + puThickness), 0);
            
            const puExtrudeSettingsBottom = { depth: depth, bevelEnabled: false };
            const puUGeometryBottom = new THREE.ExtrudeGeometry(puUShapeBottom, puExtrudeSettingsBottom);
            const puUMeshBottom = new THREE.Mesh(puUGeometryBottom, puMaterial);
            puUMeshBottom.rotation.y = Math.PI / 2;
            puUMeshBottom.position.set(-depth / 2, 0, 0);
            puUMeshBottom.castShadow = true;
            group.add(puUMeshBottom);

            // NỬA TRÊN TRÒN - Lớp PU CÓ LỖ TRÒN
            const puGeomTop = new THREE.CylinderGeometry(pipeRadius + puThickness, pipeRadius + puThickness, depth, 32, 1, false, 0, Math.PI);
            const puTop = new THREE.Mesh(puGeomTop, puMaterial);
            puTop.rotation.z = Math.PI / 2;
            puTop.castShadow = true;
            group.add(puTop);

            return group;
        }

// Hàm tạo gối đỡ tròn với cùm kim loại
function createCircularSupport(pipeRadius, thickness, height) {
    const group = new THREE.Group();
    const outerRadius = pipeRadius + thickness;
    const foamThickness = thickness * 0.3;

    // Foam đen (ôm ống)
    const foamGeometry = new THREE.CylinderGeometry(pipeRadius + foamThickness, pipeRadius + foamThickness, height, 32);
    const foam = new THREE.Mesh(foamGeometry, foamMaterial);
    foam.rotation.z = Math.PI / 2;
    foam.castShadow = true;
    group.add(foam);

    // PU vàng
    const puGeometry = new THREE.CylinderGeometry(outerRadius, outerRadius, height * 0.95, 32);
    const pu = new THREE.Mesh(puGeometry, puMaterial);
    pu.rotation.z = Math.PI / 2;
    pu.castShadow = true;
    group.add(pu);

    // Cùm kim loại
    const bandRadius = outerRadius + 0.03;
    const bandWidth = height * 0.2;
    const bandGeometry = new THREE.CylinderGeometry(bandRadius, bandRadius, bandWidth, 48);
    const band = new THREE.Mesh(bandGeometry, metalBandMaterial);
    band.rotation.z = Math.PI / 2;
    band.castShadow = true;
    group.add(band);

    // Cơ cấu siết
    const clampBoxGeometry = new THREE.BoxGeometry(0.15, bandWidth * 1.4, 0.22);
    const clampBox = new THREE.Mesh(clampBoxGeometry, metalBandMaterial);
    clampBox.position.set(0, bandRadius + 0.05, 0);
    clampBox.castShadow = true;
    group.add(clampBox);

    return group;
}

// Tạo đường ống
const pipeRadius = 0.6;
const pipeLength = 14;

const pipeGeometry = new THREE.CylinderGeometry(pipeRadius, pipeRadius, pipeLength, 48);
const pipe = new THREE.Mesh(pipeGeometry, pipeMaterial);
pipe.rotation.z = Math.PI / 2;
pipe.castShadow = true;
pipe.receiveShadow = true;
scene.add(pipe);

// === BÊN TRÁI: GỐI ĐỠ VUÔNG (MỚI) ===
const leftSupport = createSquareSupport(pipeRadius, 2.2, 1.8, 0.9);
leftSupport.position.set(-4.5, 0, 0);
scene.add(leftSupport);

// Chú thích cho gối đỡ vuông
const leftTitle = createTextLabel('GỐI ĐỠ VUÔNG', 0.35, '#1e40af');
leftTitle.position.set(-4.5, 2.5, 0);
scene.add(leftTitle);

// *** MỚI: Thêm thông tin sản phẩm cho gối đỡ vuông ***
const features = [
    "✓ Dễ lắp ráp",
    "✓ Cách nhiệt vượt trội",
    "✓ Chống thấm hoàn hảo",
    "✓ Chịu lực cao",
    "✓ Tiết kiệm 70% thời gian"
];
const featureGroup = new THREE.Group();
features.forEach((text, index) => {
    const label = createTextLabel(text, 0.2, '#15803d');
    label.position.y = -index * 0.5; // Sắp xếp theo chiều dọc
    featureGroup.add(label);
});
featureGroup.position.set(-4.5, -0.5, 0);
scene.add(featureGroup);


// === BÊN PHẢI: GỐI ĐỠ TRÒN ===
const rightSupport = createCircularSupport(pipeRadius, 0.55, 0.85);
rightSupport.position.set(4.5, 0, 0);
scene.add(rightSupport);

// Chú thích cho gối đỡ tròn
const rightTitle = createTextLabel('GỐI ĐỠ TRÒN', 0.35, '#1e40af');
rightTitle.position.set(4.5, 2.5, 0);
scene.add(rightTitle);

// Tiêu đề chính
const mainTitle = createTextLabel('GỐI ĐỠ PU - PIPE SUPPORT CLAMP', 0.5, '#1f2937');
mainTitle.position.set(0, 4.5, 0);
scene.add(mainTitle);

// Sàn
const floorGeometry = new THREE.PlaneGeometry(30, 30);
const floorMaterial = new THREE.MeshStandardMaterial({
    color: 0xffffff,
    roughness: 0.9,
    metalness: 0.05
});
const floor = new THREE.Mesh(floorGeometry, floorMaterial);
floor.rotation.x = -Math.PI / 2;
floor.position.y = -2.5;
floor.receiveShadow = true;
scene.add(floor);

// Grid
const gridHelper = new THREE.GridHelper(30, 30, 0xd0d0d0, 0xe5e5e5);
gridHelper.position.y = -2.49;
scene.add(gridHelper);

// Animation
const clock = new THREE.Clock();

function animate() {
    requestAnimationFrame(animate);

    const elapsedTime = clock.getElapsedTime();

    // *** MỚI: Animation lắp ráp cho gối đỡ vuông (Trên/Dưới) ***
    const assemblyOffset = (Math.sin(elapsedTime * 1.5) + 1) / 2 * 0.3 + 0.05; // Dao động từ 0.05 đến 0.35
    if (leftSupport.children.length === 2) {
        leftSupport.children[0].position.y = assemblyOffset; // Nửa trên đi lên
        leftSupport.children[1].position.y = -assemblyOffset; // Nửa dưới đi xuống
    }

    // Animation xoay nhẹ cho gối đỡ tròn
    rightSupport.rotation.y = Math.cos(elapsedTime * 0.5) * 0.05;

    controls.update();
    renderer.render(scene, camera);
}

// Resize
function handleResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

window.addEventListener('resize', handleResize);
handleResize();

animate();

