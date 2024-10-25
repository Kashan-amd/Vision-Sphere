<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline-404</title>
    
    <style>
        body, html {
          margin: 0;
          height: 100%;
          overflow: hidden;
          font-family: Arial, sans-serif;
        }

        .overlay {
          position: absolute;
          top: 20%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          color: white;
          z-index: 10;
        }

        .goBack {
          position: absolute;
          top: 80%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          color: white;
          z-index: 10;
        }

        .overlay h1 {
          font-size: 4rem;
          margin-bottom: 0;
        }

        .goBack p {
          font-size: 1.3rem;
        }

        canvas {
          display: block;
        }
    </style>
</head>
<body>

<div class="overlay">
    <h1>Wh<span style="color:#00d1ff">OO</span>ps!!</h1>
    <p style="font-size:1rem">Don't panic if it's not you then probably it's Us 🥹</p>
</div>
<div class="goBack">
    <p>Glasses can't help you find this page...</p><span>Refresh like 2 to 3 times <br>or <a style="text-decoration:none; color:#00d1ff" href="{{ route('home') }}">hang around</a>..</span>
</div>

<!-- Three.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
    // Basic Three.js setup
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // Add lighting to the scene
    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(5, 5, 5).normalize();
    scene.add(light);


    // Glasses 3D model (made with basic shapes: Torus and Cylinder)
    const glassesGroup = new THREE.Group();

    const frameMaterial = new THREE.MeshStandardMaterial({ color: 0x333333, metalness: 0.5, roughness: 0.2 });

    // Left lens frame (torus)
    const leftFrame = new THREE.Mesh(
      new THREE.TorusGeometry(2, 0.15, 16, 100),
      frameMaterial
    );
    leftFrame.position.x = -3;
    glassesGroup.add(leftFrame);

    // Right lens frame (torus)
    const rightFrame = new THREE.Mesh(
      new THREE.TorusGeometry(2, 0.15, 16, 100),
      frameMaterial
    );
    rightFrame.position.x = 3;
    glassesGroup.add(rightFrame);

    // Bridge (cylinder connecting the lenses)
    const bridge = new THREE.Mesh(
      new THREE.CylinderGeometry(0.1, 0.1, 4.5, 32),
      frameMaterial
    );
    bridge.rotation.z = Math.PI / 2;
    glassesGroup.add(bridge);

    // Add the glasses group to the scene
    scene.add(glassesGroup);

    camera.position.z = 10;

    // Handle mouse movement to rotate the 3D object
    document.addEventListener('mousemove', (event) => {
      const mouseX = (event.clientX / window.innerWidth) * 2 - 1;
      const mouseY = -(event.clientY / window.innerHeight) * 2 + 1;

      glassesGroup.rotation.y = mouseX * Math.PI / 4;
      glassesGroup.rotation.x = mouseY * Math.PI / 4;
    });

    // Render the scene
    const animate = function () {
      requestAnimationFrame(animate);
      renderer.render(scene, camera);
    };

    animate();

    // Handle resizing of the window
    window.addEventListener('resize', () => {
      renderer.setSize(window.innerWidth, window.innerHeight);
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
    });
</script>

</body>
</html>
