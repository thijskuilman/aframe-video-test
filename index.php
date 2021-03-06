<html>
<head>
  <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
  <script src="https://rawgit.com/rdub80/aframe-gui/master/dist/aframe-gui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body>
 <a-scene id="app">
  <a-assets>
    <video id="video" autoplay loop="true" src="video.mp4"> </video>
  </a-assets>
  <a-videosphere src="#video"></a-videosphere>

  <a-box position="-1 0.5 -3" rotation="0 45 0" color="#4CC3D9"></a-box>
  <a-gui-flex-container 
  flex-direction="column" justify-content="center" align-items="normal" component-padding="0.1" opacity="0.7" width="3.5" height="4.5"
  position="1 1 -4" rotation="0 0 0"
  >
  <a-gui-button 
  width="2.5" height="0.75"
  @click="togglePlayVideo" key-code="32"
  value="Play / Pause"
  font-family="Arial"
  margin="0 0 0.05 0"
  ></a-gui-button>
  
  <a-gui-slider  
  id="videoSlider"
  width="2.5" height="0.75"
  onclick="slideActionFunction"
  :percent="videoPercentage"
  margin="0 0 0.05 0"
  >
</a-gui-slider>
</a-gui-flex-container>

<!-- Camera + cursor. -->
<a-entity id="cameraRig" position="0 1.6 0">
  <a-camera look-controls wasd-controls position="0 0 0">
    <a-gui-cursor id="cursor"
    raycaster="objects: [gui-interactable]"
    fuse="true" fuse-timeout="1500"
    design="ring"
    >
  </a-gui-cursor>
</a-camera>
</a-entity>

</a-scene>
</body>
</html>


<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      videoPercentage: "0.29"
    },
    mounted() {
      console.log('Starting application')

    },
    methods: {
      togglePlayVideo() {
        video = document.querySelector("#video");
        if(video.paused) {
          document.querySelector("#video").play()
        } else {
          document.querySelector("#video").pause()
        }
      },
      updateSlider() {

      }
    }
  });
</script>